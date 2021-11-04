<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Api\Actions\Put;

use CodeKandis\AccuMail\Api\Actions\AbstractWriteAction;
use CodeKandis\AccuMail\Api\Entities\UriExtenders\JobApiUriExtender;
use CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories\EMailAddressEntityRepository;
use CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories\EMailAttachmentEntityRepository;
use CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories\EMailEntityRepository;
use CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories\JobEntityRepository;
use CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories\ServerConnectionAuthenticationCredentialEntityRepository;
use CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories\ServerConnectionEntityRepository;
use CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories\UserEntityRepository;
use CodeKandis\AccuMailEntities\Collections\EMailAddressEntityCollection;
use CodeKandis\AccuMailEntities\Collections\EMailAttachmentEntityCollection;
use CodeKandis\AccuMailEntities\EMailAddressEntity;
use CodeKandis\AccuMailEntities\EMailAttachmentEntity;
use CodeKandis\AccuMailEntities\EMailEntity;
use CodeKandis\AccuMailEntities\EMailEntityInterface;
use CodeKandis\AccuMailEntities\Enumerations\EMailAddressTypes;
use CodeKandis\AccuMailEntities\Enumerations\JobStatuses;
use CodeKandis\AccuMailEntities\JobEntity;
use CodeKandis\AccuMailEntities\JobEntityInterface;
use CodeKandis\AccuMailEntities\ServerConnectionAuthenticationCredentialEntity;
use CodeKandis\AccuMailEntities\ServerConnectionEntity;
use CodeKandis\AccuMailEntities\ServerConnectionEntityInterface;
use CodeKandis\AccuMailEntities\UserEntityInterface;
use CodeKandis\Persistence\FetchingResultFailedException;
use CodeKandis\Persistence\SettingFetchModeFailedException;
use CodeKandis\Persistence\StatementExecutionFailedException;
use CodeKandis\Persistence\StatementPreparationFailedException;
use CodeKandis\Persistence\TransactionCommitFailedException;
use CodeKandis\Persistence\TransactionRollbackFailedException;
use CodeKandis\Persistence\TransactionStartFailedException;
use CodeKandis\Tiphy\Http\Requests\BadRequestException;
use CodeKandis\Tiphy\Http\Responses\JsonResponder;
use CodeKandis\Tiphy\Http\Responses\StatusCodes;
use CodeKandis\Tiphy\Throwables\ErrorInformation;
use DateTimeImmutable;
use JsonException;
use ReflectionException;
use stdClass;
use function array_map;

/**
 * Represents the action to put a job.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class CreateJobAction extends AbstractWriteAction
{
	/**
	 * {@inheritDoc}
	 * @throws ReflectionException An error occurred during an entity creation.
	 * @throws ReflectionException An entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 * @throws JsonException An error occurred during the serialization of the response.
	 */
	public function execute(): void
	{
		try
		{
			$inputData = $this->getInputData(
				[
					'job'
				]
			);
		}
		catch ( BadRequestException $exception )
		{
			$errorInformation = new ErrorInformation( $exception->getCode(), $exception->getMessage() );
			( new JsonResponder( StatusCodes::BAD_REQUEST, null, $errorInformation ) )
				->respond();

			return;
		}

		$user = $this->getAuthenticatedUser();

		/**
		 * @var JobEntityInterface $job
		 */
		$job = JobEntity::fromArray(
			[
				'user'             => $user,
				'status'           => JobStatuses::CREATED,
				'timestampCreated' => new DateTimeImmutable(),
				'serverConnection' => $this->getServerConnection( $inputData[ 'job' ] ),
				'eMail'            => $this->getEmail( $inputData[ 'job' ] )
			]
		);

		$createdJob = $this->readJobByRecordId(
			$this->createJobByUserId( $job, $user )
		);
		$this->extendUris( $createdJob );

		( new JsonResponder( StatusCodes::OK, $createdJob ) )
			->respond();
	}

	/**
	 * Gets the server connection from the input data.
	 * @param stdClass $inputData The input data.
	 * @return ServerConnectionEntityInterface The server connection.
	 * @throws ReflectionException An error occurred during the entity creation.
	 */
	private function getServerConnection( stdClass $inputData ): ServerConnectionEntityInterface
	{
		return ServerConnectionEntity::fromArray(
			[
				'host'                     => $inputData->{'serverConnection'}->{'host'},
				'port'                     => $inputData->{'serverConnection'}->{'port'},
				'encryptionType'           => $inputData->{'serverConnection'}->{'encryptionType'},
				'authenticationCredential' => ServerConnectionAuthenticationCredentialEntity::fromObject( $inputData->{'serverConnection'}->{'authenticationCredential'} ),
			]
		);
	}

	/**
	 * Gets the e-mail from the input data.
	 * @param stdClass $inputData The input data.
	 * @return EMailEntityInterface The e-mail.
	 * @throws ReflectionException An error occurred during the entity creation.
	 */
	private function getEMail( stdClass $inputData ): EMailEntityInterface
	{
		return EMailEntity::fromArray(
			[
				'fromAddress'     => EMailAddressEntity::fromArray(
					[
						'type'    => 'FROM',
						'name'    => $inputData->{'eMail'}->{'fromAddress'}->{'name'},
						'address' => $inputData->{'eMail'}->{'fromAddress'}->{'address'}
					]
				),
				'toAddresses'     => new EMailAddressEntityCollection(
					...array_map(
						fn( stdClass $toAddress ) => EMailAddressEntity::fromArray(
							[
								'type'    => 'TO',
								'name'    => $toAddress->{'name'},
								'address' => $toAddress->{'address'}
							]
						),
						$inputData->{'eMail'}->{'toAddresses'}
					)
				),
				'ccAddresses'     => new EMailAddressEntityCollection(
					...array_map(
						fn( stdClass $ccAddress ) => EMailAddressEntity::fromArray(
							[
								'type'    => 'CC',
								'name'    => $ccAddress->{'name'},
								'address' => $ccAddress->{'address'}
							]
						),
						$inputData->{'eMail'}->{'ccAddresses'}
					)
				),
				'bccAddresses'    => new EMailAddressEntityCollection(
					...array_map(
						fn( stdClass $bccAddress ) => EMailAddressEntity::fromArray(
							[
								'type'    => 'BCC',
								'name'    => $bccAddress->{'name'},
								'address' => $bccAddress->{'address'}
							]
						),
						$inputData->{'eMail'}->{'bccAddresses'}
					)
				),
				'subject'         => $inputData->{'eMail'}->{'subject'},
				'isHtmlBody'      => $inputData->{'eMail'}->{'isHtmlBody'},
				'body'            => $inputData->{'eMail'}->{'body'},
				'alternativeBody' => $inputData->{'eMail'}->{'alternativeBody'},
				'attachments'     => new EMailAttachmentEntityCollection(
					...array_map(
						fn( stdClass $attachment ) => EMailAttachmentEntity::fromObject( $attachment ),
						$inputData->{'eMail'}->{'attachments'}
					)
				)
			]
		);
	}

	/**
	 * Extends the URIs of a job.
	 * @param JobEntityInterface $job The job to extend its URIs.
	 */
	private function extendUris( JobEntityInterface $job ): void
	{
		( new JobApiUriExtender(
			$this->getApiUriBuilder(),
			$job
		) )
			->extend();
	}

	/**
	 * Reads a specific job by its record ID.
	 * @param JobEntityInterface $requestedJob The job with the record ID to find.
	 * @return ?JobEntityInterface The job if found, null otherwise.
	 * @throws ReflectionException An entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	private function readJobByRecordId( JobEntityInterface $requestedJob ): ?JobEntityInterface
	{
		return $this->getDatabaseConnector()->asTransaction(
			function () use ( $requestedJob )
			{
				$job = ( new JobEntityRepository(
					$this->getDatabaseConnector()
				) )
					->readJobById( $requestedJob );

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
									'type' => EMailAddressTypes::TO
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
									'type' => EMailAddressTypes::CC
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
									'type' => EMailAddressTypes::BCC
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

				return $job;
			}
		);
	}

	/**
	 * Creates a job by a specific user.
	 * @param JobEntityInterface $job The job to write.
	 * @param UserEntityInterface $user The user writing the status.
	 * @return JobEntityInterface The created job.
	 * @throws ReflectionException An entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 */
	private function createJobByUserId( JobEntityInterface $job, UserEntityInterface $user ): JobEntityInterface
	{
		return $this->getDatabaseConnector()->asTransaction(
			function () use ( $job, $user )
			{
				$jobsRepository = new JobEntityRepository(
					$this->getDatabaseConnector()
				);
				$createdJob     = $jobsRepository->readJobByRecordId(
					$jobsRepository->createJobByUserId( $job, $user )
				);

				$serverConnectionRepository = new ServerConnectionEntityRepository(
					$this->getDatabaseConnector()
				);
				$createdJob->setServerConnection(
					$serverConnectionRepository->readServerConnectionByRecordId(
						$serverConnectionRepository->createServerConnectionByJobId(
							$job->getServerConnection(),
							$createdJob
						)
					)
				);

				$serverConnectionAuthenticationCredentialsRepository = new ServerConnectionAuthenticationCredentialEntityRepository(
					$this->getDatabaseConnector()
				);
				$createdJob
					->getServerConnection()
					->setAuthenticationCredential(
						$serverConnectionAuthenticationCredentialsRepository->readServerConnectionAuthenticationCredentialByRecordId(
							$serverConnectionAuthenticationCredentialsRepository->createServerConnectionAuthenticationCredentialByServerConnectionId(
								$job
									->getServerConnection()
									->getAuthenticationCredential(),
								$createdJob->getServerConnection()
							)
						)
					);

				$eMailRepository = new EMailEntityRepository(
					$this->getDatabaseConnector()
				);
				$createdJob->setEMail(
					$eMailRepository->readEMailByRecordId(
						$eMailRepository->createEMailByJobId(
							$job->getEMail(),
							$createdJob
						)
					)
				);

				$eMailAddressesRepository = new EMailAddressEntityRepository(
					$this->getDatabaseConnector()
				);
				$createdJob
					->getEMail()
					->setFromAddress(
						$eMailAddressesRepository->readEMailAddressByRecordId(
							$eMailAddressesRepository->createEMailAddressByEMailId(
								$job
									->getEMail()
									->getFromAddress(),
								$createdJob->getEMail()
							)
						)
					);

				$createdToAddresses = [];
				foreach ( $job->getEMail()->getToAddresses() as $toAddress )
				{
					$createdToAddresses[] = $eMailAddressesRepository->readEMailAddressByRecordId(
						$eMailAddressesRepository->createEMailAddressByEMailId(
							$toAddress,
							$createdJob->getEMail()
						)
					);
				}
				$createdJob
					->getEMail()
					->setToAddresses(
						new EMailAddressEntityCollection( ...$createdToAddresses )
					);

				$createdCcAddresses = [];
				foreach ( $job->getEMail()->getCcAddresses() as $toAddress )
				{
					$createdCcAddresses[] = $eMailAddressesRepository->readEMailAddressByRecordId(
						$eMailAddressesRepository->createEMailAddressByEMailId(
							$toAddress,
							$createdJob->getEMail()
						)
					);
				}
				$createdJob
					->getEMail()
					->setCcAddresses(
						new EMailAddressEntityCollection( ...$createdCcAddresses )
					);

				$createdBccAddresses = [];
				foreach ( $job->getEMail()->getBccAddresses() as $toAddress )
				{
					$createdBccAddresses[] = $eMailAddressesRepository->readEMailAddressByRecordId(
						$eMailAddressesRepository->createEMailAddressByEMailId(
							$toAddress,
							$createdJob->getEMail()
						)
					);
				}
				$createdJob
					->getEMail()
					->setBccAddresses(
						new EMailAddressEntityCollection( ...$createdBccAddresses )
					);

				$eMailAttachmentsRepository = ( new EMailAttachmentEntityRepository(
					$this->getDatabaseConnector()
				) );
				$createdAttachments         = [];
				foreach ( $job->getEMail()->getAttachments() as $attachment )
				{
					$createdAttachments[] = $eMailAttachmentsRepository->readEMailAttachmentByRecordId(
						$eMailAttachmentsRepository->createEMailAttachmentByEMailId(
							$attachment,
							$createdJob->getEMail()
						)
					);
				}
				$createdJob
					->getEMail()
					->setAttachments(
						new EMailAttachmentEntityCollection( ...$createdAttachments )
					);

				return $createdJob;
			}
		);
	}
}
