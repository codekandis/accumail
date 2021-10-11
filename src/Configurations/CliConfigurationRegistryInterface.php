<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Configurations;

use CodeKandis\Configurations\ConfigurationRegistryInterface;
use CodeKandis\Tiphy\Persistence\PersistenceConfigurationInterface;

/**
 * Represents the interface of any CLI configuration registry.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface CliConfigurationRegistryInterface extends ConfigurationRegistryInterface
{
	/**
	 * Gets the persistence configuration.
	 * @return ?PersistenceConfigurationInterface The path of the persistence configuration.
	 */
	public function getPersistenceConfiguration(): ?PersistenceConfigurationInterface;
}
