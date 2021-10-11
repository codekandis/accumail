<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Cli\Commands\EMails\Write;

use CodeKandis\AccuMail\Cli\Commands\AbstractCommand;
use CodeKandis\AccuMail\Environment\EMails\Mailer;
use CodeKandis\AccuMail\Environment\Entities\Collections\JobEntityCollectionInterface;
use CodeKandis\AccuMail\Environment\Entities\EMailAddressEntity;
use CodeKandis\AccuMail\Environment\Entities\EMailEntity;
use CodeKandis\AccuMail\Environment\Entities\Enumerations\EMailTypes;
use CodeKandis\AccuMail\Environment\Entities\Enumerations\JobStatuses;
use CodeKandis\AccuMail\Environment\Entities\JobEntity;
use CodeKandis\AccuMail\Environment\Entities\JobEntityInterface;
use CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories\EMailAddressEntityRepository;
use CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories\EMailAttachmentEntityRepository;
use CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories\EMailEntityRepository;
use CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories\JobEntityRepository;
use CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories\ServerConnectionAuthenticationCredentialEntityRepository;
use CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories\ServerConnectionEntityRepository;
use CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories\UserEntityRepository;
use CodeKandis\Tiphy\Persistence\MariaDb\FetchingResultFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\SettingFetchModeFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\StatementExecutionFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\StatementPreparationFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\TransactionCommitFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\TransactionRollbackFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\TransactionStartFailedException;
use DateTimeImmutable;
use PHPMailer\PHPMailer\Exception;
use Psr\Log\LogLevel;
use ReflectionException;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Represents the command to send all e-mails.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class SendAll extends AbstractCommand
{
	/**
	 * {@inheritDoc}
	 */
	protected const COMMAND_NAME = 'e-mails:send-all';

	/**
	 * {@inheritDoc}
	 */
	protected const COMMAND_DESCRIPTION = 'Sends all e-mails.';

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException An entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 * @throws Exception An error occured during processing the job.
	 */
	protected function execute( InputInterface $input, OutputInterface $output ): int
	{
		$jobs = $this->readJobs();

		foreach ( $jobs as $job )
		{
			$job->setTimestampProcessed( new DateTimeImmutable() );

			try
			{
				$this->processJob( $job );
				$this->logger->log( LogLevel::INFO, 'Succeeded.' );
				$job->setStatus( JobStatuses::SENT_SUCCEEDED );
			}
			catch ( Exception $exception )
			{
				$this->logger->log( LogLevel::ERROR, 'Failed.' );
				$job->setStatus( JobStatuses::SENT_FAILED );
			}

			$this->updateJob( $job );
		}

		return 0;
	}

	/**
	 * Reads all jobs by the status `CREATED` from the persistence.
	 * @return JobEntityCollectionInterface The jobs.
	 * @throws ReflectionException An entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	private function readJobs(): JobEntityCollectionInterface
	{
		$this->logger->log( LogLevel::INFO, 'Fetching all unprocessed jobs.' );

		$jobs = $this->getDatabaseConnector()->asTransaction(
			function ()
			{
				$jobs = ( new JobEntityRepository(
					$this->getDatabaseConnector()
				) )
					->readJobsByStatus(
						JobEntity::fromArray(
							[
								'status' => JobStatuses::CREATED
							]
						)
					);

				foreach ( $jobs as $job )
				{
					$job->setUser(
						( new UserEntityRepository(
							$this->getDatabaseConnector()
						) )
							->readUserByJobId( $job )
					);

					$job->setServerConnection(
						( new ServerConnectionEntityRepository(
							$this->getDatabaseConnector()
						) )
							->readServerConnectionByJobId( $job )
					);

					$job->getServerConnection()
						->setAuthenticationCredential(
							( new ServerConnectionAuthenticationCredentialEntityRepository(
								$this->getDatabaseConnector()
							) )
								->readServerConnectionAuthenticationCredentialByServerConnectionId( $job->getServerConnection() )
						);

					$job->setEMail(
						( new EMailEntityRepository(
							$this->getDatabaseConnector()
						) )
							->readEMailByJobId( $job )
					);

					$eMailAddressesRepository = new EMailAddressEntityRepository(
						$this->getDatabaseConnector()
					);
					$job
						->getEMail()
						->setFromAddress(
							$eMailAddressesRepository->readEMailAddressByEMailId(
								$job->getEMail()
							)
						);

					$job
						->getEMail()
						->setToAddresses(
							$eMailAddressesRepository->readEMailAddressesByEMailIdAndType(
								EMailEntity::fromArray(
									[
										'id' => $job->getEMail()->getId()
									]
								),
								EMailAddressEntity::fromArray(
									[
										'type' => EMailTypes::TO
									]
								)
							)
						);

					$job
						->getEMail()
						->setCcAddresses(
							$eMailAddressesRepository->readEMailAddressesByEMailIdAndType(
								EMailEntity::fromArray(
									[
										'id' => $job->getEMail()->getId()
									]
								),
								EMailAddressEntity::fromArray(
									[
										'type' => EMailTypes::CC
									]
								)
							)
						);

					$job
						->getEMail()
						->setBccAddresses(
							$eMailAddressesRepository->readEMailAddressesByEMailIdAndType(
								EMailEntity::fromArray(
									[
										'id' => $job->getEMail()->getId()
									]
								),
								EMailAddressEntity::fromArray(
									[
										'type' => EMailTypes::BCC
									]
								)
							)
						);

					$job
						->getEMail()
						->setAttachments(
							( new EMailAttachmentEntityRepository(
								$this->getDatabaseConnector()
							) )
								->readEMailAttachmentsByEMailId(
									EMailEntity::fromArray(
										[
											'id' => $job->getEMail()->getId()
										]
									)
								)
						);
				}

				return $jobs;
			}
		);

		$this->logger->log(
			LogLevel::INFO,
			sprintf(
				'Found: %s',
				count( $jobs )
			)
		);

		return $jobs;
	}

	/**
	 * Processes a job.
	 * @param JobEntityInterface $job The job to process.
	 * @throws Exception An error occured during processing the job.
	 */
	private function processJob( JobEntityInterface $job ): void
	{
		( new Mailer( $job ) )
			->process();
	}

	/**
	 * Writes a job to the persistence.
	 * @param JobEntityInterface $job The job to write.
	 * @throws ReflectionException An entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 */
	private function updateJob( JobEntityInterface $job ): void
	{
		$this->logger->log(
			LogLevel::INFO,
			sprintf(
				'Processing job: %s',
				$job->getId()
			)
		);

		$this->getDatabaseConnector()->asTransaction(
			function () use ( $job )
			{
				( new JobEntityRepository(
					$this->getDatabaseConnector()
				) )
					->updateJobStatus( $job );
			}
		);
	}
}
