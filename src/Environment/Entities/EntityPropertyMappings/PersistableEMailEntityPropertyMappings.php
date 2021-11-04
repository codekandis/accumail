<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities\EntityPropertyMappings;

/**
 * Represents the entity property mappings of the persistable e-mail entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class PersistableEMailEntityPropertyMappings extends EMailEntityPropertyMappings
{
	use PersistableEntityPropertyMappingTrait;
}
