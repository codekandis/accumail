<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

use CodeKandis\AccuMailEntities\UserEntity;

/**
 * Represents a user entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class PersistableUserEntity extends UserEntity implements PersistableUserEntityInterface
{
	use PersistableEntityTrait;
}
