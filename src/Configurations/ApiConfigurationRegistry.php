<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Configurations;

use CodeKandis\TiphySentryClientIntegration\Configurations\AbstractConfigurationRegistry;
use function dirname;

/**
 * Represents an API configuration registry.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class ApiConfigurationRegistry extends AbstractConfigurationRegistry implements ApiConfigurationRegistryInterface
{
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
		$this->setPlainSentryClientConfiguration(
			array_merge(
				require __DIR__ . '/Plain/sentryClient.php',
				require dirname( __DIR__, 2 ) . '/config/sentryClient.php'
			)
		);
		$this->setPlainPersistenceConfiguration(
			array_merge(
				require __DIR__ . '/Plain/persistence.php',
				require dirname( __DIR__, 2 ) . '/config/persistence.php'
			)
		);
		$this->setPlainRoutesConfiguration(
			array_merge(
				require __DIR__ . '/Plain/routes.php',
				require dirname( __DIR__, 2 ) . '/config/routes.php'
			)
		);
		$this->setPlainUriBuilderConfiguration(
			array_merge(
				require __DIR__ . '/Plain/apiUriBuilder.php',
				require dirname( __DIR__, 2 ) . '/config/uriBuilder.php'
			)
		);
	}
}
