<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Cli\Commands;

use CodeKandis\AccuMail\Configurations\CliConfigurationRegistryInterface;
use CodeKandis\Console\Commands\LoggableCommand;
use CodeKandis\Tiphy\Persistence\MariaDb\Connector;
use CodeKandis\Tiphy\Persistence\MariaDb\ConnectorInterface;
use Psr\Log\LoggerInterface;

/**
 * Represents the base class of any command.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class AbstractCommand extends LoggableCommand
{
	/**
	 * Stores the configuration registry of the command.
	 * @var CliConfigurationRegistryInterface
	 */
	protected CliConfigurationRegistryInterface $configurationRegistry;

	/**
	 * Stores the persistence connector of the command.
	 * @var ConnectorInterface
	 */
	private ConnectorInterface $databaseConnector;

	/**
	 * Gets the persistence connector of the command.
	 * @return ConnectorInterface The persistence connector of the command.
	 */
	protected function getDatabaseConnector(): ConnectorInterface
	{
		return $this->databaseConnector ??
			   $this->databaseConnector = new Connector(
				   $this
					   ->configurationRegistry
					   ->getPersistenceConfiguration()
			   );
	}

	/**
	 * Constructor method.
	 * @param LoggerInterface $logger The logger of the command.
	 * @param ?string $name The name of the command.
	 * @param CliConfigurationRegistryInterface $configurationRegistry The configuration registry of the command.
	 */
	public function __construct( LoggerInterface $logger, ?string $name, CliConfigurationRegistryInterface $configurationRegistry )
	{
		parent::__construct( $logger, $name );

		$this->configurationRegistry = $configurationRegistry;
	}
}
