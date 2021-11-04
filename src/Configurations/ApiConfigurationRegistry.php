<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Configurations;

use CodeKandis\Configurations\PlainConfigurationLoader;
use CodeKandis\Tiphy\Configurations\AbstractConfigurationRegistry;
use CodeKandis\Tiphy\Configurations\RoutesConfiguration;
use CodeKandis\Tiphy\Configurations\UriBuilderConfiguration;
use CodeKandis\TiphyPersistenceIntegration\Configurations\ConfigurationRegistryTrait as PersistenceConfigurationRegistryTrait;
use CodeKandis\TiphyPersistenceIntegration\Configurations\PersistenceConfiguration;
use CodeKandis\TiphySentryClientIntegration\Configurations\ConfigurationRegistryTrait as SentryClientConfigurationRegistryTrait;
use CodeKandis\TiphySentryClientIntegration\Configurations\SentryClientConfiguration;
use function dirname;

/**
 * Represents an API configuration registry.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class ApiConfigurationRegistry extends AbstractConfigurationRegistry implements ApiConfigurationRegistryInterface
{
	use SentryClientConfigurationRegistryTrait;
	use PersistenceConfigurationRegistryTrait;

	/**
	 * Creates the singleton instance of the API configuration registry.
	 * @return ApiConfigurationRegistryInterface The singleton instance of the API configuration registry.
	 */
	public static function _(): ApiConfigurationRegistryInterface
	{
		return parent::_();
	}

	/**
	 * {@inheritDoc}
	 */
	protected function initialize(): void
	{
		$this->sentryClientConfiguration = new SentryClientConfiguration(
			( new PlainConfigurationLoader() )
				->load( __DIR__ . '/Plain', 'sentryClient' )
				->load( dirname( __DIR__, 2 ) . '/config', 'sentryClient' )
				->getPlainConfiguration()
		);
		$this->persistenceConfiguration  = new PersistenceConfiguration(
			( new PlainConfigurationLoader() )
				->load( __DIR__ . '/Plain', 'persistence' )
				->load( dirname( __DIR__, 2 ) . '/config', 'persistence' )
				->getPlainConfiguration()
		);
		$this->routesConfiguration       = new RoutesConfiguration(
			( new PlainConfigurationLoader() )
				->load( __DIR__ . '/Plain', 'routes' )
				->load( dirname( __DIR__, 2 ) . '/config', 'routes' )
				->getPlainConfiguration()
		);
		$this->uriBuilderConfiguration   = new UriBuilderConfiguration(
			( new PlainConfigurationLoader() )
				->load( __DIR__ . '/Plain', 'apiUriBuilder' )
				->load( dirname( __DIR__, 2 ) . '/config', 'uriBuilder' )
				->getPlainConfiguration()
		);
	}
}
