<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

use CodeKandis\AccuMailEntities\ServerConnectionAuthenticationCredentialEntity;

/**
 * Represents a server connection authentication credential entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class PersistableServerConnectionAuthenticationCredentialEntity extends ServerConnectionAuthenticationCredentialEntity implements PersistableServerConnectionAuthenticationCredentialEntityInterface
{
	use PersistableEntityTrait;
}
