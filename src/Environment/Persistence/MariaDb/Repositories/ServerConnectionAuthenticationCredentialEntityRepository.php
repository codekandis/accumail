<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories;

use CodeKandis\AccuMail\Environment\Entities\Collections\ServerConnectionAuthenticationCredentialEntityCollection;
use CodeKandis\AccuMail\Environment\Entities\Collections\ServerConnectionAuthenticationCredentialEntityCollectionInterface;
use CodeKandis\AccuMail\Environment\Entities\EntityPropertyMappings\EntityPropertyMapperBuilder;
use CodeKandis\AccuMail\Environment\Entities\ServerConnectionAuthenticationCredentialEntity;
use CodeKandis\AccuMail\Environment\Entities\ServerConnectionAuthenticationCredentialEntityInterface;
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
 * Represents the MariaDB repository of the server connection authentication credential entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class ServerConnectionAuthenticationCredentialEntityRepository extends AbstractRepository implements ServerConnectionAuthenticationCredentialEntityRepositoryInterface
{
	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The server connection authentication credential entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readServerConnectionAuthenticationCredentials(): ServerConnectionAuthenticationCredentialEntityCollectionInterface
	{
		$query = <<< END
			SELECT
				`serverConnectionAuthenticationCredentials`.*
			FROM
				`serverConnectionAuthenticationCredentials`
			ORDER BY
				`serverConnectionAuthenticationCredentials`.`_id` ASC;
		END;

		$serverConnectionAuthenticationCredentialEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildServerConnectionAuthenticationCredentialEntityPropertyMapper();

		return new ServerConnectionAuthenticationCredentialEntityCollection(
			...$this->databaseConnector->query( $query, null, $serverConnectionAuthenticationCredentialEntityPropertyMapper )
		);
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The server connection authentication credential entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readServerConnectionAuthenticationCredentialByRecordId( ServerConnectionAuthenticationCredentialEntityInterface $serverConnectionAuthenticationCredential ): ?ServerConnectionAuthenticationCredentialEntityInterface
	{
		$query = <<< END
			SELECT
				`serverConnectionAuthenticationCredentials`.*
			FROM
				`serverConnectionAuthenticationCredentials`
			WHERE
				`serverConnectionAuthenticationCredentials`.`_id` = :_id
			LIMIT
				0, 1;
		END;

		$serverConnectionAuthenticationCredentialEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildServerConnectionAuthenticationCredentialEntityPropertyMapper();
		$mappedServerConnectionAuthenticationCredential               = $serverConnectionAuthenticationCredentialEntityPropertyMapper->mapToArray( $serverConnectionAuthenticationCredential );
		$arguments                                                    = [
			'_id' => $mappedServerConnectionAuthenticationCredential[ '_id' ]
		];

		return $this->databaseConnector->queryFirst( $query, $arguments, $serverConnectionAuthenticationCredentialEntityPropertyMapper );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The server connection authentication credential entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readServerConnectionAuthenticationCredentialById( ServerConnectionAuthenticationCredentialEntityInterface $serverConnectionAuthenticationCredential ): ?ServerConnectionAuthenticationCredentialEntityInterface
	{
		$query = <<< END
			SELECT
				`serverConnectionAuthenticationCredentials`.*
			FROM
				`serverConnectionAuthenticationCredentials`
			WHERE
				`serverConnectionAuthenticationCredentials`.`id` = :id
			LIMIT
				0, 1;
		END;

		$serverConnectionAuthenticationCredentialEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildServerConnectionAuthenticationCredentialEntityPropertyMapper();
		$mappedServerConnectionAuthenticationCredential               = $serverConnectionAuthenticationCredentialEntityPropertyMapper->mapToArray( $serverConnectionAuthenticationCredential );
		$arguments                                                    = [
			'id' => $mappedServerConnectionAuthenticationCredential[ 'id' ]
		];

		return $this->databaseConnector->queryFirst( $query, $arguments, $serverConnectionAuthenticationCredentialEntityPropertyMapper );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The server connection entity class to reflect does not exist.
	 * @throws ReflectionException The server connection authentication credential entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readServerConnectionAuthenticationCredentialByServerConnectionId( ServerConnectionEntityInterface $serverConnection ): ?ServerConnectionAuthenticationCredentialEntityInterface
	{
		$query = <<< END
			SELECT
				`serverConnectionAuthenticationCredentials`.*
			FROM
				`serverConnectionAuthenticationCredentials`
			WHERE
				`serverConnectionAuthenticationCredentials`.`serverConnectionId` = :serverConnectionId
			LIMIT
				0, 1;
		END;

		$serverConnectionEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildServerConnectionEntityPropertyMapper();
		$serverConnectionAuthenticationCredentialEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildServerConnectionAuthenticationCredentialEntityPropertyMapper();
		$mappedServerConnection = $serverConnectionEntityPropertyMapper->mapToArray( $serverConnection );
		$arguments = [
			'serverConnectionId' => $mappedServerConnection[ 'id' ]
		];

		return $this->databaseConnector->queryFirst( $query, $arguments, $serverConnectionAuthenticationCredentialEntityPropertyMapper );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The server connection authentication credential entity class to reflect does not exist.
	 * @throws ReflectionException The server connection entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws InvalidArgumentsStatementsCountException The number of argument lists does not match the number of statements.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 */
	public function createServerConnectionAuthenticationCredentialByServerConnectionId( ServerConnectionAuthenticationCredentialEntityInterface $serverConnectionAuthenticationCredential, ServerConnectionEntityInterface $serverConnection ): ServerConnectionAuthenticationCredentialEntityInterface
	{
		$query = <<< END
			INSERT INTO
				`serverConnectionAuthenticationCredentials`
				( `id`, `serverConnectionId`, `username`, `password` )
			VALUES
				( UUID( ), :serverConnectionId, :username, :password );
		END;

		$serverConnectionAuthenticationCredentialEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildServerConnectionAuthenticationCredentialEntityPropertyMapper();
		$mappedServerConnectionAuthenticationCredential               = $serverConnectionAuthenticationCredentialEntityPropertyMapper->mapToArray( $serverConnectionAuthenticationCredential );
		$serverConnectionEntityPropertyMapper                         = ( new EntityPropertyMapperBuilder() )
			->buildServerConnectionEntityPropertyMapper();
		$mappedServerConnection                                       = $serverConnectionEntityPropertyMapper->mapToArray( $serverConnection );
		$arguments                                                    = [
			'serverConnectionId' => $mappedServerConnection[ 'id' ],
			'username'           => $mappedServerConnectionAuthenticationCredential[ 'username' ],
			'password'           => $mappedServerConnectionAuthenticationCredential[ 'password' ]
		];

		$this->databaseConnector->execute( $query, $arguments );

		return ServerConnectionAuthenticationCredentialEntity::fromArray(
			[
				'_id' => $this->databaseConnector->getLastInsertId()
			]
		);
	}
}
