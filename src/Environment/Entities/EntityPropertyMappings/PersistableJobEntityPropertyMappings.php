<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities\EntityPropertyMappings;

/**
 * Represents the entity property mappings of the persistable job entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class PersistableJobEntityPropertyMappings extends JobEntityPropertyMappings
{
	use PersistableEntityPropertyMappingTrait;
}
