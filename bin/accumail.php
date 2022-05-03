<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Bin;

use CodeKandis\AccuMail\Cli\Commands\ApplicationCommandCollection;
use CodeKandis\AccuMail\Cli\Loggers\ApplicationLoggerCollection;
use CodeKandis\AccuMail\Configurations\CliConfigurationRegistry;
use CodeKandis\Console\Commands\ApplicationCommandsInjector;
use CodeKandis\SentryClient\SentryClient;
use Psr\Log\LogLevel;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Output\ConsoleOutput;
use Throwable;
use function dirname;
use function error_reporting;
use function ini_set;
use const E_ALL;

/**
 * Represents the bootstrap script of the application.
 * @package codekandis/accumail
 * @author  Christian Ramelow <info@codekandis.net>
 */
error_reporting( E_ALL );
ini_set( 'display_errors', 'On' );
ini_set( 'html_errors', 'Off' );

require_once dirname( __DIR__, 1 ) . '/vendor/autoload.php';

$sentryClient = new SentryClient(
	CliConfigurationRegistry
		::_()
		->getSentryClientConfiguration()
);
$sentryClient->register();

$application = new Application( 'codekandis/accumail', '0.2.2' );
$application->setCatchExceptions( false );

$applicationLoggerCollection = new ApplicationLoggerCollection();

try
{
	( new ApplicationCommandsInjector( $application ) )
		->inject(
			new ApplicationCommandCollection( $applicationLoggerCollection )
		);

	$application->run();
}
catch ( Throwable $throwable )
{
	$applicationLoggerCollection->log( LogLevel::ERROR, $throwable->getMessage() );
	$application->renderThrowable(
		$throwable,
		( new ConsoleOutput() )
			->getErrorOutput()
	);
	$sentryClient->captureThrowable( $throwable );

	exit( 1 );
}
