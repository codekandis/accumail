<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Api\Actions\Get;

use CodeKandis\AccuMail\Environment\Entities\Collections\JobEntityCollectionInterface;
use CodeKandis\AccuMail\Environment\Entities\JobEntityInterface;
use CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories\JobEntityRepository;
use CodeKandis\Tiphy\Http\Responses\JsonResponder;
use CodeKandis\Tiphy\Http\Responses\StatusCodes;
use CodeKandis\Tiphy\Persistence\MariaDb\FetchingResultFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\SettingFetchModeFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\StatementExecutionFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\StatementPreparationFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\TransactionCommitFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\TransactionRollbackFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\TransactionStartFailedException;
use JsonException;
use ReflectionException;

/**
 * Represents the action to get all jobs with a specific status.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class AbstractJobsByStatusAction extends AbstractJobsAction
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
		$jobs = $this->readAllJobsByStatus( $this->getRequestedJob() );

		$this->extendUris( $jobs );

		( new JsonResponder(
			StatusCodes::OK,
			[
				'jobs' => $jobs
			]
		) )
			->respond();
	}

	/**
	 * Gets the job with the requested status.
	 * @return JobEntityInterface The job with the requested status.
	 */
	abstract protected function getRequestedJob(): JobEntityInterface;

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
	private function readAllJobsByStatus( JobEntityInterface $requestedJob ): JobEntityCollectionInterface
	{
		return $this->getDatabaseConnector()->asTransaction(
			function () use ( $requestedJob )
			{
				$jobs = ( new JobEntityRepository(
					$this->getDatabaseConnector()
				) )
					->readJobsByStatus( $requestedJob );

				$this->appendAdditionalJobDatas( $jobs );

				return $jobs;
			}
		);
	}
}
