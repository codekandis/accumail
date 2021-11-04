<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities\EntityPropertyMappings;

/**
 * Represents the entity property mappings of the persistable e-mail address entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class PersistableEMailAddressEntityPropertyMappings extends EMailAddressEntityPropertyMappings
{
	use PersistableEntityPropertyMappingTrait;
}
