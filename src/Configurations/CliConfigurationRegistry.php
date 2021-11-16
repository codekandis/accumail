<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Configurations;

use CodeKandis\Configurations\AbstractConfigurationRegistry;
use CodeKandis\Configurations\PlainConfigurationLoader;
use CodeKandis\TiphyPersistenceIntegration\Configurations\ConfigurationRegistryTrait as PersistenceConfigurationRegistryTrait;
use CodeKandis\TiphyPersistenceIntegration\Configurations\PersistenceConfiguration;
use CodeKandis\TiphySentryClientIntegration\Configurations\ConfigurationRegistryTrait as SentryClientConfigurationRegistryTrait;
use CodeKandis\TiphySentryClientIntegration\Configurations\SentryClientConfiguration;
use function dirname;

/**
 * Represents a CLI configuration registry.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class CliConfigurationRegistry extends AbstractConfigurationRegistry implements CliConfigurationRegistryInterface
{
	use SentryClientConfigurationRegistryTrait;
	use PersistenceConfigurationRegistryTrait;

	/**
	 * Creates the singleton instance of the CLI configuration registry.
	 * @return CliConfigurationRegistryInterface The singleton instance of the CLI configuration registry.
	 */
	public static function _(): CliConfigurationRegistryInterface
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
	}
}
