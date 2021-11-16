<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities\EntityPropertyMappings;

/**
 * Represents the entity property mappings of the persistable API key entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class PersistableApiKeyEntityPropertyMappings extends ApiKeyEntityPropertyMappings
{
	use PersistableEntityPropertyMappingTrait;
}
