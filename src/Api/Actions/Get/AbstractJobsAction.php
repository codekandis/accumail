<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Api\Actions\Get;

use CodeKandis\AccuMail\Api\Actions\AbstractReadAction;
use CodeKandis\AccuMail\Api\Entities\UriExtenders\JobApiUriExtender;
use CodeKandis\AccuMail\Environment\Entities\Collections\JobEntityCollectionInterface;
use CodeKandis\AccuMail\Environment\Entities\EMailAddressEntity;
use CodeKandis\AccuMail\Environment\Entities\EMailEntity;
use CodeKandis\AccuMail\Environment\Entities\Enumerations\EMailTypes;
use CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories\EMailAddressEntityRepository;
use CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories\EMailAttachmentEntityRepository;
use CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories\EMailEntityRepository;
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
use ReflectionException;

/**
 * Represents the base action to get all jobs.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class AbstractJobsAction extends AbstractReadAction
{
	/**
	 * Extends the URIs of a list of jobs.
	 * @param JobEntityCollectionInterface $jobs The jobs to extend their URIs.
	 */
	protected function extendUris( JobEntityCollectionInterface $jobs ): void
	{
		foreach ( $jobs as $job )
		{
			( new JobApiUriExtender(
				$this->getApiUriBuilder(),
				$job
			) )
				->extend();
		}
	}

	/**
	 * Reads all jobs by a specific status.
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
	protected function appendAdditionalJobDatas( JobEntityCollectionInterface $jobs ): void
	{
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
						->readEMailAttachmentsByEMailIdWithoutContent(
							EMailEntity::fromArray(
								[
									'id' => $job->getEMail()->getId()
								]
							)
						)
				);
		}
	}
}
