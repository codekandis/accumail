<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

use CodeKandis\AccuMailEntities\ServerConnectionAuthenticationCredentialEntityInterface;

/**
 * Represents the interface of any server connection authentication credential entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface PersistableServerConnectionAuthenticationCredentialEntityInterface extends ServerConnectionAuthenticationCredentialEntityInterface, PersistableEntityInterface
{
}
