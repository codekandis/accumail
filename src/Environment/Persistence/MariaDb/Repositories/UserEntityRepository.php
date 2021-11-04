<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories;

use CodeKandis\AccuMail\Environment\Entities\EntityPropertyMappings\EntityPropertyMapperBuilder;
use CodeKandis\AccuMail\Environment\Entities\PersistableUserEntityInterface;
use CodeKandis\AccuMailEntities\ApiKeyEntityInterface;
use CodeKandis\AccuMailEntities\Collections\UserEntityCollection;
use CodeKandis\AccuMailEntities\Collections\UserEntityCollectionInterface;
use CodeKandis\AccuMailEntities\JobEntityInterface;
use CodeKandis\AccuMailEntities\UserEntityInterface;
use CodeKandis\Persistence\FetchingResultFailedException;
use CodeKandis\Persistence\Repositories\AbstractRepository;
use CodeKandis\Persistence\SettingFetchModeFailedException;
use CodeKandis\Persistence\StatementExecutionFailedException;
use CodeKandis\Persistence\StatementPreparationFailedException;
use CodeKandis\Persistence\TransactionCommitFailedException;
use CodeKandis\Persistence\TransactionRollbackFailedException;
use CodeKandis\Persistence\TransactionStartFailedException;
use ReflectionException;

/**
 * Represents the MariaDB repository of the user entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class UserEntityRepository extends AbstractRepository implements UserEntityRepositoryInterface
{
	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The user entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readUsers(): UserEntityCollectionInterface
	{
		$query = <<< END
			SELECT
				`users`.*
			FROM
				`users`
			ORDER BY
				`users`.`_id` ASC;
		END;

		$userEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildUserEntityPropertyMapper();

		return new UserEntityCollection(
			...$this->databaseConnector->query( $query, null, $userEntityPropertyMapper )
		);
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The user entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readUserByRecordId( PersistableUserEntityInterface $user ): ?UserEntityInterface
	{
		$query = <<< END
			SELECT
				`users`.*
			FROM
				`users`
			WHERE
				`users`.`_id` = :_id
			LIMIT
				0, 1;
		END;

		$persistableUserEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildPersistableUserEntityPropertyMapper();
		$userEntityPropertyMapper            = ( new EntityPropertyMapperBuilder() )
			->buildUserEntityPropertyMapper();

		$mappedPersistableUser = $persistableUserEntityPropertyMapper->mapToArray( $user );

		$arguments = [
			'_id' => $mappedPersistableUser[ '_id' ]
		];

		return $this->databaseConnector->queryFirst( $query, $arguments, $userEntityPropertyMapper );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The user entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readUserById( UserEntityInterface $user ): ?UserEntityInterface
	{
		$query = <<< END
			SELECT
				`users`.*
			FROM
				`users`
			WHERE
				`users`.`id` = :id
			LIMIT
				0, 1;
		END;

		$userEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildUserEntityPropertyMapper();

		$mappedUser = $userEntityPropertyMapper->mapToArray( $user );

		$arguments = [
			'id' => $mappedUser[ 'id' ]
		];

		return $this->databaseConnector->queryFirst( $query, $arguments, $userEntityPropertyMapper );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The API key entity class to reflect does not exist.
	 * @throws ReflectionException The user entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readUserByApiKey( ApiKeyEntityInterface $apiKey ): ?UserEntityInterface
	{
		$query = <<< END
			SELECT
				`users`.*
			FROM
				`users`
			JOIN
				`apiKeys`
			ON
			    `apiKeys`.`userId` = `users`.`id`
			WHERE
				`apiKeys`.`key` = :key
			LIMIT
				0, 1;
		END;

		$apiKeyEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildApiKeyEntityPropertyMapper();
		$userEntityPropertyMapper   = ( new EntityPropertyMapperBuilder() )
			->buildUserEntityPropertyMapper();

		$mappedApiKey = $apiKeyEntityPropertyMapper->mapToArray( $apiKey );

		$arguments = [
			'key' => $mappedApiKey[ 'key' ]
		];

		return $this->databaseConnector->queryFirst( $query, $arguments, $userEntityPropertyMapper );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The job entity class to reflect does not exist.
	 * @throws ReflectionException The user entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readUserByJobId( JobEntityInterface $job ): ?UserEntityInterface
	{
		$query = <<< END
			SELECT
				`users`.*
			FROM
				`users`
			JOIN
				`jobs`
			ON
			    `jobs`.`userId` = `users`.`id`
			WHERE
				`jobs`.`id` = :jobId
			LIMIT
				0, 1;
		END;

		$jobEntityPropertyMapper  = ( new EntityPropertyMapperBuilder() )
			->buildJobEntityPropertyMapper();
		$userEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildUserEntityPropertyMapper();

		$mappedJob = $jobEntityPropertyMapper->mapToArray( $job );

		$arguments = [
			'jobId' => $mappedJob[ 'id' ]
		];

		return $this->databaseConnector->queryFirst( $query, $arguments, $userEntityPropertyMapper );
	}
}
