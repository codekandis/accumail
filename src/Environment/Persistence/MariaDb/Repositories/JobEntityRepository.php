<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories;

use CodeKandis\AccuMail\Environment\Entities\EntityPropertyMappings\EntityPropertyMapperBuilder;
use CodeKandis\AccuMail\Environment\Entities\PersistableJobEntityInterface;
use CodeKandis\AccuMailEntities\Collections\JobEntityCollection;
use CodeKandis\AccuMailEntities\Collections\JobEntityCollectionInterface;
use CodeKandis\AccuMailEntities\JobEntityInterface;
use CodeKandis\AccuMailEntities\UserEntityInterface;
use CodeKandis\Persistence\FetchingResultFailedException;
use CodeKandis\Persistence\InvalidArgumentsStatementsCountException;
use CodeKandis\Persistence\Repositories\AbstractRepository;
use CodeKandis\Persistence\SettingFetchModeFailedException;
use CodeKandis\Persistence\StatementExecutionFailedException;
use CodeKandis\Persistence\StatementPreparationFailedException;
use CodeKandis\Persistence\TransactionCommitFailedException;
use CodeKandis\Persistence\TransactionRollbackFailedException;
use CodeKandis\Persistence\TransactionStartFailedException;
use ReflectionException;

/**
 * Represents the MariaDB repository of the job entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class JobEntityRepository extends AbstractRepository implements JobEntityRepositoryInterface
{
	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The job entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readJobs(): JobEntityCollectionInterface
	{
		$query = <<< END
			SELECT
				`jobs`.*
			FROM
				`jobs`
			ORDER BY
				`jobs`.`_id` ASC;
		END;

		$jobEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildJobEntityPropertyMapper();

		return new JobEntityCollection(
			...$this->databaseConnector->query( $query, null, $jobEntityPropertyMapper )
		);
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The job entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readJobsByStatus( JobEntityInterface $job ): JobEntityCollectionInterface
	{
		$query = <<< END
			SELECT
				`jobs`.*
			FROM
				`jobs`
			WHERE
				`jobs`.`status` = :status
			ORDER BY
				`jobs`.`_id` ASC;
		END;

		$jobEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildJobEntityPropertyMapper();

		$mappedJob = $jobEntityPropertyMapper->mapToArray( $job );

		$arguments = [
			'status' => $mappedJob[ 'status' ]
		];

		return new JobEntityCollection(
			...$this->databaseConnector->query( $query, $arguments, $jobEntityPropertyMapper )
		);
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The job entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readJobByRecordId( PersistableJobEntityInterface $job ): ?JobEntityInterface
	{
		$query = <<< END
			SELECT
				`jobs`.*
			FROM
				`jobs`
			WHERE
				`jobs`.`_id` = :_id
			LIMIT
				0, 1;
		END;

		$persistableJobEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildPersistableJobEntityPropertyMapper();
		$jobEntityPropertyMapper            = ( new EntityPropertyMapperBuilder() )
			->buildJobEntityPropertyMapper();

		$mappedPersistableJob = $persistableJobEntityPropertyMapper->mapToArray( $job );

		$arguments = [
			'_id' => $mappedPersistableJob[ '_id' ]
		];

		return $this->databaseConnector->queryFirst( $query, $arguments, $jobEntityPropertyMapper );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The job entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readJobById( JobEntityInterface $job ): ?JobEntityInterface
	{
		$query = <<< END
			SELECT
				`jobs`.*
			FROM
				`jobs`
			WHERE
				`jobs`.`id` = :id
			LIMIT
				0, 1;
		END;

		$jobEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildJobEntityPropertyMapper();

		$mappedJob = $jobEntityPropertyMapper->mapToArray( $job );

		$arguments = [
			'id' => $mappedJob[ 'id' ]
		];

		return $this->databaseConnector->queryFirst( $query, $arguments, $jobEntityPropertyMapper );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The job entity class to reflect does not exist.
	 * @throws ReflectionException The user entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws InvalidArgumentsStatementsCountException The number of argument lists does not match the number of statements.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 */
	public function createJobByUserId( JobEntityInterface $job, UserEntityInterface $user ): PersistableJobEntityInterface
	{
		$query = <<< END
			INSERT INTO
				`jobs`
				( `id`, `userId`, `status`, `timestampCreated` )
			VALUES
				( UUID( ), :userId, :status, :timestampCreated );
		END;

		$jobEntityPropertyMapper            = ( new EntityPropertyMapperBuilder() )
			->buildJobEntityPropertyMapper();
		$userEntityPropertyMapper           = ( new EntityPropertyMapperBuilder() )
			->buildUserEntityPropertyMapper();
		$persistableJobEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildPersistableJobEntityPropertyMapper();

		$mappedJob  = $jobEntityPropertyMapper->mapToArray( $job );
		$mappedUser = $userEntityPropertyMapper->mapToArray( $user );

		$arguments = [
			'userId'           => $mappedUser[ 'id' ],
			'status'           => $mappedJob[ 'status' ],
			'timestampCreated' => $mappedJob[ 'timestampCreated' ]
		];

		$this->databaseConnector->execute( $query, $arguments );

		return $persistableJobEntityPropertyMapper->mapFromArray(
			[
				'_id' => $this->databaseConnector->getLastInsertId()
			]
		);
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The job entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws InvalidArgumentsStatementsCountException The number of argument lists does not match the number of statements.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 */
	public function updateJobStatus( JobEntityInterface $job ): void
	{
		$query = <<< END
			UPDATE
				`jobs`
			SET
				`status` = :status,
			    `timestampProcessed` = :timestampProcessed
			WHERE
				`id` = :id;
		END;

		$jobEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildJobEntityPropertyMapper();

		$mappedJob = $jobEntityPropertyMapper->mapToArray( $job );

		$arguments = [
			'id'                 => $mappedJob[ 'id' ],
			'status'             => $mappedJob[ 'status' ],
			'timestampProcessed' => $mappedJob[ 'timestampProcessed' ]
		];

		$this->databaseConnector->execute( $query, $arguments );
	}
}
