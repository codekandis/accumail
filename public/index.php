<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail;

use CodeKandis\AccuMail\Configurations\ApiConfigurationRegistry;
use CodeKandis\SentryClient\SentryClient;
use CodeKandis\Tiphy\Actions\ActionDispatcher;
use CodeKandis\Tiphy\Persistence\MariaDb\Connector;
use CodeKandis\TiphyAuthenticationIntegration\Actions\PreDispatchment\Api\AuthorizationHeaderKeyAuthenticationPreDispatcher;
use CodeKandis\TiphyAuthenticationIntegration\Persistence\Repositories\Authentication\UsersRepository;
use CodeKandis\TiphySentryClientIntegration\Development\Throwables\Handlers\InternalServerErrorThrowableHandler;
use function dirname;
use function error_reporting;
use function ini_set;
use const E_ALL;

/**
 * Represents the bootstrap script of the project.
 * @package codekandis/accumail
 * @author  Christian Ramelow <info@codekandis.net>
 */
error_reporting( E_ALL );
ini_set( 'display_errors', 'On' );
ini_set( 'html_errors', 'Off' );

require_once dirname( __DIR__, 1 ) . '/vendor/autoload.php';

/** @var ApiConfigurationRegistry $configurationRegistry */
$configurationRegistry = ApiConfigurationRegistry::_();
$sentryClient          = new SentryClient( $configurationRegistry->getSentryClientConfiguration() );
$sentryClient->register();

$actionDispatcher = new ActionDispatcher(
	$configurationRegistry->getRoutesConfiguration(),
	new AuthorizationHeaderKeyAuthenticationPreDispatcher(
		new UsersRepository(
			new Connector(
				ApiConfigurationRegistry::_()->getPersistenceConfiguration()
			)
		)
	),
	new InternalServerErrorThrowableHandler( $sentryClient )
);
$actionDispatcher->dispatch();
