<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories;

use CodeKandis\AccuMail\Environment\Entities\Collections\JobEntityCollection;
use CodeKandis\AccuMail\Environment\Entities\Collections\JobEntityCollectionInterface;
use CodeKandis\AccuMail\Environment\Entities\EntityPropertyMappings\EntityPropertyMapperBuilder;
use CodeKandis\AccuMail\Environment\Entities\JobEntity;
use CodeKandis\AccuMail\Environment\Entities\JobEntityInterface;
use CodeKandis\AccuMail\Environment\Entities\UserEntityInterface;
use CodeKandis\Tiphy\Persistence\MariaDb\FetchingResultFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\InvalidArgumentsStatementsCountException;
use CodeKandis\Tiphy\Persistence\MariaDb\Repositories\AbstractRepository;
use CodeKandis\Tiphy\Persistence\MariaDb\SettingFetchModeFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\StatementExecutionFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\StatementPreparationFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\TransactionCommitFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\TransactionRollbackFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\TransactionStartFailedException;
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
		$mappedJob               = $jobEntityPropertyMapper->mapToArray( $job );
		$arguments               = [
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
	public function readJobByRecordId( JobEntityInterface $job ): ?JobEntityInterface
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

		$jobEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildJobEntityPropertyMapper();
		$mappedJob               = $jobEntityPropertyMapper->mapToArray( $job );
		$arguments               = [
			'_id' => $mappedJob[ '_id' ]
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
		$mappedJob               = $jobEntityPropertyMapper->mapToArray( $job );
		$arguments               = [
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
	public function createJobByUserId( JobEntityInterface $job, UserEntityInterface $user ): JobEntityInterface
	{
		$query = <<< END
			INSERT INTO
				`jobs`
				( `id`, `userId`, `status`, `timestampCreated` )
			VALUES
				( UUID( ), :userId, :status, :timestampCreated );
		END;

		$jobEntityPropertyMapper  = ( new EntityPropertyMapperBuilder() )
			->buildJobEntityPropertyMapper();
		$mappedJob                = $jobEntityPropertyMapper->mapToArray( $job );
		$userEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildUserEntityPropertyMapper();
		$mappedUser               = $userEntityPropertyMapper->mapToArray( $user );
		$arguments                = [
			'userId'           => $mappedUser[ 'id' ],
			'status'           => $mappedJob[ 'status' ],
			'timestampCreated' => $mappedJob[ 'timestampCreated' ]
		];

		$this->databaseConnector->execute( $query, $arguments );

		return JobEntity::fromArray(
			[
				'_id' => $this->databaseConnector->getLastInsertId()
			]
		);
	}
}
