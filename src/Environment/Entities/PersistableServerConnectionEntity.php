<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

use CodeKandis\AccuMailEntities\ServerConnectionEntity;

/**
 * Represents a server connection entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class PersistableServerConnectionEntity extends ServerConnectionEntity implements PersistableServerConnectionEntityInterface
{
	use PersistableEntityTrait;
}
