<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Api\Actions;

use CodeKandis\AccuMail\Api\Http\UriBuilders\ApiUriBuilder;
use CodeKandis\AccuMail\Api\Http\UriBuilders\ApiUriBuilderInterface;
use CodeKandis\AccuMail\Configurations\ApiConfigurationRegistry;
use CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories\UserEntityRepository;
use CodeKandis\AccuMailEntities\ApiKeyEntity;
use CodeKandis\AccuMailEntities\ApiKeyEntityInterface;
use CodeKandis\AccuMailEntities\UserEntityInterface;
use CodeKandis\Authentication\AuthorizationHeader\AuthorizationHeaderParser;
use CodeKandis\Persistence\Connector;
use CodeKandis\Persistence\ConnectorInterface;
use CodeKandis\Persistence\FetchingResultFailedException;
use CodeKandis\Persistence\SettingFetchModeFailedException;
use CodeKandis\Persistence\StatementExecutionFailedException;
use CodeKandis\Persistence\StatementPreparationFailedException;
use CodeKandis\Persistence\TransactionCommitFailedException;
use CodeKandis\Persistence\TransactionRollbackFailedException;
use CodeKandis\Persistence\TransactionStartFailedException;
use CodeKandis\Tiphy\Actions\AbstractAction as OriginAbstractAction;
use ReflectionException;
use function hash;

/**
 * Represents the base class of all actions.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class AbstractAction extends OriginAbstractAction
{
	/**
	 * Stores the API URI builder of the action.
	 * @var ApiUriBuilderInterface
	 */
	private ApiUriBuilderInterface $apiUriBuilder;

	/**
	 * Gets the API URI builder of the action.
	 * @return ApiUriBuilderInterface The API URI builder of the action.
	 */
	protected function getApiUriBuilder(): ApiUriBuilderInterface
	{
		return $this->apiUriBuilder ??
			   $this->apiUriBuilder = new ApiUriBuilder(
				   ApiConfigurationRegistry::_()->getUriBuilderConfiguration()
			   );
	}

	/**
	 * Stores the persistence connector of the action.
	 * @var ConnectorInterface
	 */
	private ConnectorInterface $databaseConnector;

	/**
	 * Gets the persistence connector of the action.
	 * @return ConnectorInterface The persistence connector of the action.
	 */
	protected function getDatabaseConnector(): ConnectorInterface
	{
		return $this->databaseConnector ??
			   $this->databaseConnector = new Connector(
				   ApiConfigurationRegistry::_()->getPersistenceConfiguration()
			   );
	}

	/**
	 * Gets the API key of the current authenticated user.
	 * @return ApiKeyEntityInterface The API key of the current authenticated user.
	 * @throws ReflectionException An error occurred during an entity creation.
	 */
	private function getApiKey(): ApiKeyEntityInterface
	{
		/**
		 * @var ApiKeyEntityInterface
		 */
		return ApiKeyEntity::fromArray(
			[
				'key' => hash(
					'sha512',
					( new AuthorizationHeaderParser() )
						->parse()
						->getValue()
				)
			]
		);
	}

	/**
	 * Gets the current authenticated user.
	 * @return ?UserEntityInterface The current authenticated user.
	 * @throws ReflectionException An error occurred during an entity creation.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	protected function getAuthenticatedUser(): ?UserEntityInterface
	{
		return ( new UserEntityRepository(
			$this->getDatabaseConnector()
		) )
			->readUserByApiKey(
				$this->getApiKey()
			);
	}
}
