<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

use CodeKandis\AccuMailEntities\JobEntity;

/**
 * Represents a job entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class PersistableJobEntity extends JobEntity implements PersistableJobEntityInterface
{
	use PersistableEntityTrait;
}
