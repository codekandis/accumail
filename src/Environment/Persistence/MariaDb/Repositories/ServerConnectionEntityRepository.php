<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories;

use CodeKandis\AccuMail\Environment\Entities\Collections\ServerConnectionEntityCollection;
use CodeKandis\AccuMail\Environment\Entities\Collections\ServerConnectionEntityCollectionInterface;
use CodeKandis\AccuMail\Environment\Entities\EntityPropertyMappings\EntityPropertyMapperBuilder;
use CodeKandis\AccuMail\Environment\Entities\JobEntityInterface;
use CodeKandis\AccuMail\Environment\Entities\ServerConnectionEntity;
use CodeKandis\AccuMail\Environment\Entities\ServerConnectionEntityInterface;
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
	public function readServerConnectionByRecordId( ServerConnectionEntityInterface $serverConnection ): ?ServerConnectionEntityInterface
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

		$serverConnectionEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildServerConnectionEntityPropertyMapper();
		$mappedServerConnection               = $serverConnectionEntityPropertyMapper->mapToArray( $serverConnection );
		$arguments                            = [
			'_id' => $mappedServerConnection[ '_id' ]
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
		$mappedServerConnection               = $serverConnectionEntityPropertyMapper->mapToArray( $serverConnection );
		$arguments                            = [
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
		$mappedJob                            = $jobEntityPropertyMapper->mapToArray( $job );
		$arguments                            = [
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
	public function createServerConnectionByJobId( ServerConnectionEntityInterface $serverConnection, JobEntityInterface $job ): ServerConnectionEntityInterface
	{
		$query = <<< END
			INSERT INTO
				`serverConnections`
				( `id`, `jobId`, `host`, `port`, `encryptionType` )
			VALUES
				( UUID( ), :jobId, :host, :port, :encryptionType );
		END;

		$serverConnectionEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildServerConnectionEntityPropertyMapper();
		$mappedServerConnection               = $serverConnectionEntityPropertyMapper->mapToArray( $serverConnection );
		$jobEntityPropertyMapper              = ( new EntityPropertyMapperBuilder() )
			->buildJobEntityPropertyMapper();
		$mappedJob                            = $jobEntityPropertyMapper->mapToArray( $job );
		$arguments                            = [
			'jobId'          => $mappedJob[ 'id' ],
			'host'           => $mappedServerConnection[ 'host' ],
			'port'           => $mappedServerConnection[ 'port' ],
			'encryptionType' => $mappedServerConnection[ 'encryptionType' ]
		];

		$this->databaseConnector->execute( $query, $arguments );

		return ServerConnectionEntity::fromArray(
			[
				'_id' => $this->databaseConnector->getLastInsertId()
			]
		);
	}
}
