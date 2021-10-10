<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities\EntityPropertyMappings;

use CodeKandis\Tiphy\Entities\EntityPropertyMappings\EntityPropertyMapping;
use CodeKandis\Tiphy\Entities\EntityPropertyMappings\EntityPropertyMappingExistsException;
use CodeKandis\Tiphy\Entities\EntityPropertyMappings\EntityPropertyMappingInterface;
use CodeKandis\Tiphy\Entities\EntityPropertyMappings\EntityPropertyMappings;

/**
 * Represents the base class of all entity property mappings.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class AbstractEntityPropertyMappings extends EntityPropertyMappings
{
	/**
	 * Constructor method.
	 * @param EntityPropertyMappingInterface ...$entityPropertyMappings The additional entity property mappings.
	 * @throws EntityPropertyMappingExistsException An entity property mapping with a specific property name already exists.
	 */
	public function __construct( EntityPropertyMappingInterface ...$entityPropertyMappings )
	{
		parent::__construct(
			new EntityPropertyMapping( '_id', null ),
			new EntityPropertyMapping( 'id', null ),
			...$entityPropertyMappings,
		);
	}
}
