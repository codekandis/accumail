<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Configurations;

use CodeKandis\Tiphy\Configurations\ConfigurationRegistryInterface;
use CodeKandis\TiphyPersistenceIntegration\Configurations\ConfigurationRegistryInterface as PersistenceConfigurationRegistryInterface;
use CodeKandis\TiphySentryClientIntegration\Configurations\ConfigurationRegistryInterface as SentryClientConfigurationRegistryInterface;

/**
 * Represents the interface of any API configuration registry.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ApiConfigurationRegistryInterface extends ConfigurationRegistryInterface, SentryClientConfigurationRegistryInterface, PersistenceConfigurationRegistryInterface
{
}
