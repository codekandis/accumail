<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories;

use CodeKandis\AccuMail\Environment\Entities\EntityPropertyMappings\EntityPropertyMapperBuilder;
use CodeKandis\AccuMail\Environment\Entities\PersistableServerConnectionEntityInterface;
use CodeKandis\AccuMailEntities\Collections\ServerConnectionEntityCollection;
use CodeKandis\AccuMailEntities\Collections\ServerConnectionEntityCollectionInterface;
use CodeKandis\AccuMailEntities\JobEntityInterface;
use CodeKandis\AccuMailEntities\ServerConnectionEntityInterface;
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
 * Represents the MariaDB repository of the server connection entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class ServerConnectionEntityRepository extends AbstractRepository implements ServerConnectionEntityRepositoryInterface
{
	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The server connection entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readServerConnections(): ServerConnectionEntityCollectionInterface
	{
		$query = <<< END
			SELECT
				`serverConnections`.*
			FROM
				`serverConnections`
			ORDER BY
				`serverConnections`.`_id` ASC;
		END;

		$serverConnectionEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildServerConnectionEntityPropertyMapper();

		return new ServerConnectionEntityCollection(
			...$this->databaseConnector->query( $query, null, $serverConnectionEntityPropertyMapper )
		);
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The server connection entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readServerConnectionByRecordId( PersistableServerConnectionEntityInterface $serverConnection ): ?ServerConnectionEntityInterface
	{
		$query = <<< END
			SELECT
				`serverConnections`.*
			FROM
				`serverConnections`
			WHERE
				`serverConnections`.`_id` = :_id
			LIMIT
				0, 1;
		END;

		$persistableServerConnectionEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildPersistableServerConnectionEntityPropertyMapper();
		$serverConnectionEntityPropertyMapper            = ( new EntityPropertyMapperBuilder() )
			->buildServerConnectionEntityPropertyMapper();

		$mappedPersistableServerConnection = $persistableServerConnectionEntityPropertyMapper->mapToArray( $serverConnection );

		$arguments = [
			'_id' => $mappedPersistableServerConnection[ '_id' ]
		];

		return $this->databaseConnector->queryFirst( $query, $arguments, $serverConnectionEntityPropertyMapper );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The server connection entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readServerConnectionById( ServerConnectionEntityInterface $serverConnection ): ?ServerConnectionEntityInterface
	{
		$query = <<< END
			SELECT
				`serverConnections`.*
			FROM
				`serverConnections`
			WHERE
				`serverConnections`.`id` = :id
			LIMIT
				0, 1;
		END;

		$serverConnectionEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildServerConnectionEntityPropertyMapper();

		$mappedServerConnection = $serverConnectionEntityPropertyMapper->mapToArray( $serverConnection );

		$arguments = [
			'id' => $mappedServerConnection[ 'id' ]
		];

		return $this->databaseConnector->queryFirst( $query, $arguments, $serverConnectionEntityPropertyMapper );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The job entity class to reflect does not exist.
	 * @throws ReflectionException The server connection entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readServerConnectionByJobId( JobEntityInterface $job ): ?ServerConnectionEntityInterface
	{
		$query = <<< END
			SELECT
				`serverConnections`.*
			FROM
				`serverConnections`
			WHERE
				`serverConnections`.`jobId` = :jobId
			LIMIT
				0, 1;
		END;

		$jobEntityPropertyMapper              = ( new EntityPropertyMapperBuilder() )
			->buildJobEntityPropertyMapper();
		$serverConnectionEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildServerConnectionEntityPropertyMapper();

		$mappedJob = $jobEntityPropertyMapper->mapToArray( $job );

		$arguments = [
			'jobId' => $mappedJob[ 'id' ]
		];

		return $this->databaseConnector->queryFirst( $query, $arguments, $serverConnectionEntityPropertyMapper );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The server connection entity class to reflect does not exist.
	 * @throws ReflectionException The job entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws InvalidArgumentsStatementsCountException The number of argument lists does not match the number of statements.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 */
	public function createServerConnectionByJobId( ServerConnectionEntityInterface $serverConnection, JobEntityInterface $job ): PersistableServerConnectionEntityInterface
	{
		$query = <<< END
			INSERT INTO
				`serverConnections`
				( `id`, `jobId`, `host`, `port`, `encryptionType` )
			VALUES
				( UUID( ), :jobId, :host, :port, :encryptionType );
		END;

		$serverConnectionEntityPropertyMapper            = ( new EntityPropertyMapperBuilder() )
			->buildServerConnectionEntityPropertyMapper();
		$jobEntityPropertyMapper                         = ( new EntityPropertyMapperBuilder() )
			->buildJobEntityPropertyMapper();
		$persistableServerConnectionEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildPersistableServerConnectionEntityPropertyMapper();

		$mappedServerConnection = $serverConnectionEntityPropertyMapper->mapToArray( $serverConnection );
		$mappedJob              = $jobEntityPropertyMapper->mapToArray( $job );

		$arguments = [
			'jobId'          => $mappedJob[ 'id' ],
			'host'           => $mappedServerConnection[ 'host' ],
			'port'           => $mappedServerConnection[ 'port' ],
			'encryptionType' => $mappedServerConnection[ 'encryptionType' ]
		];

		$this->databaseConnector->execute( $query, $arguments );

		return $persistableServerConnectionEntityPropertyMapper->mapFromArray(
			[
				'_id' => $this->databaseConnector->getLastInsertId()
			]
		);
	}
}
