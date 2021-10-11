<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Cli\Commands;

use CodeKandis\AccuMail\Cli\Commands\EMails\Write\SendAll;
use CodeKandis\AccuMail\Configurations\CliConfigurationRegistry;
use CodeKandis\Console\Commands\CommandCollection;
use Psr\Log\LoggerInterface;

/**
 * Represents the collection of commands of the application.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class ApplicationCommandCollection extends CommandCollection
{
	/**
	 * Constructor method.
	 * @param LoggerInterface $logger The logger to inject into the commands.
	 */
	public function __construct( LoggerInterface $logger )
	{
		$configurationRegistry = CliConfigurationRegistry::_();

		parent::__construct(
			new SendAll( $logger, null, $configurationRegistry )
		);
	}
}
