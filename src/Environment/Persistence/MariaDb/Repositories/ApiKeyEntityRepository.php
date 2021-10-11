<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories;

use CodeKandis\AccuMail\Environment\Entities\ApiKeyEntityInterface;
use CodeKandis\AccuMail\Environment\Entities\Collections\ApiKeyEntityCollection;
use CodeKandis\AccuMail\Environment\Entities\Collections\ApiKeyEntityCollectionInterface;
use CodeKandis\AccuMail\Environment\Entities\EntityPropertyMappings\EntityPropertyMapperBuilder;
use CodeKandis\Tiphy\Persistence\MariaDb\FetchingResultFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\Repositories\AbstractRepository;
use CodeKandis\Tiphy\Persistence\MariaDb\SettingFetchModeFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\StatementExecutionFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\StatementPreparationFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\TransactionCommitFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\TransactionRollbackFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\TransactionStartFailedException;
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
	public function readApiKeyByRecordId( ApiKeyEntityInterface $apiKey ): ?ApiKeyEntityInterface
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

		$apiKeyEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildApiKeyEntityPropertyMapper();
		$mappedApiKey               = $apiKeyEntityPropertyMapper->mapToArray( $apiKey );
		$arguments                  = [
			'_id' => $mappedApiKey[ '_id' ]
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
		$mappedApiKey               = $apiKeyEntityPropertyMapper->mapToArray( $apiKey );
		$arguments                  = [
			'id' => $mappedApiKey[ 'id' ]
		];

		return $this->databaseConnector->queryFirst( $query, $arguments, $apiKeyEntityPropertyMapper );
	}
}
