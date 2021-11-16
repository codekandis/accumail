<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories;

use CodeKandis\AccuMail\Environment\Entities\EntityPropertyMappings\EntityPropertyMapperBuilder;
use CodeKandis\AccuMail\Environment\Entities\PersistableApiKeyEntityInterface;
use CodeKandis\AccuMailEntities\ApiKeyEntityInterface;
use CodeKandis\AccuMailEntities\Collections\ApiKeyEntityCollection;
use CodeKandis\AccuMailEntities\Collections\ApiKeyEntityCollectionInterface;
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
 * Represents the MariaDB repository of the API key entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class ApiKeyEntityRepository extends AbstractRepository implements ApiKeyEntityRepositoryInterface
{
	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The API key entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readApiKeys(): ApiKeyEntityCollectionInterface
	{
		$query = <<< END
			SELECT
				`apiKeys`.*
			FROM
				`apiKeys`
			ORDER BY
				`apiKeys`.`_id` ASC;
		END;

		$apiKeyEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildApiKeyEntityPropertyMapper();

		return new ApiKeyEntityCollection(
			...$this->databaseConnector->query( $query, null, $apiKeyEntityPropertyMapper )
		);
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The API key entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readApiKeyByRecordId( PersistableApiKeyEntityInterface $apiKey ): ?ApiKeyEntityInterface
	{
		$query = <<< END
			SELECT
				`apiKeys`.*
			FROM
				`apiKeys`
			WHERE
				`apiKeys`.`_id` = :_id
			LIMIT
				0, 1;
		END;

		$persistableApiKeyEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildPersistableApiKeyEntityPropertyMapper();
		$apiKeyEntityPropertyMapper            = ( new EntityPropertyMapperBuilder() )
			->buildApiKeyEntityPropertyMapper();

		$mappedPersistableApiKey = $persistableApiKeyEntityPropertyMapper->mapToArray( $apiKey );

		$arguments = [
			'_id' => $mappedPersistableApiKey[ '_id' ]
		];

		return $this->databaseConnector->queryFirst( $query, $arguments, $apiKeyEntityPropertyMapper );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The API key entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readApiKeyById( ApiKeyEntityInterface $apiKey ): ?ApiKeyEntityInterface
	{
		$query = <<< END
			SELECT
				`apiKeys`.*
			FROM
				`apiKeys`
			WHERE
				`apiKeys`.`id` = :id
			LIMIT
				0, 1;
		END;

		$apiKeyEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildApiKeyEntityPropertyMapper();

		$mappedApiKey = $apiKeyEntityPropertyMapper->mapToArray( $apiKey );

		$arguments = [
			'id' => $mappedApiKey[ 'id' ]
		];

		return $this->databaseConnector->queryFirst( $query, $arguments, $apiKeyEntityPropertyMapper );
	}
}
