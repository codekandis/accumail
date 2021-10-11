<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Configurations;

use CodeKandis\Configurations\AbstractConfigurationRegistry;
use CodeKandis\SentryClient\Configurations\SentryClientConfigurationInterface;
use CodeKandis\Tiphy\Persistence\PersistenceConfiguration;
use CodeKandis\Tiphy\Persistence\PersistenceConfigurationInterface;
use CodeKandis\TiphySentryClientIntegration\Configurations\SentryClientConfiguration;
use function array_merge;
use function dirname;

/**
 * Represents a CLI configuration registry.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class CliConfigurationRegistry extends AbstractConfigurationRegistry implements CliConfigurationRegistryInterface
{
	/**
	 * Stores the sentry client configuration.
	 * @var ?SentryClientConfigurationInterface
	 */
	private ?SentryClientConfigurationInterface $sentryClientConfiguration = null;

	/**
	 * Stores the persistence configuration.
	 * @var ?PersistenceConfigurationInterface
	 */
	private ?PersistenceConfigurationInterface $persistenceConfiguration = null;

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
	public function getSentryClientConfiguration(): ?SentryClientConfigurationInterface
	{
		return $this->sentryClientConfiguration;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getPersistenceConfiguration(): ?PersistenceConfigurationInterface
	{
		return $this->persistenceConfiguration;
	}

	/**
	 * {@inheritDoc}
	 */
	protected function initialize(): void
	{
		$this->sentryClientConfiguration = new SentryClientConfiguration(
			array_merge(
				require __DIR__ . '/Plain/sentryClient.php',
				require dirname( __DIR__, 2 ) . '/config/sentryClient.php'
			)
		);
		$this->persistenceConfiguration  = new PersistenceConfiguration(
			array_merge(
				require __DIR__ . '/Plain/persistence.php',
				require dirname( __DIR__, 2 ) . '/config/persistence.php'
			)
		);
	}
}
