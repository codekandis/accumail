<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities\EntityPropertyMappings;

use CodeKandis\Tiphy\Entities\EntityPropertyMappings\EntityPropertyMapping;
use CodeKandis\Tiphy\Entities\EntityPropertyMappings\EntityPropertyMappingExistsException;
use CodeKandis\Tiphy\Entities\EntityPropertyMappings\EntityPropertyMappingInterface;

/**
 * Represents the base class of any server connection related entity property mappings.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class AbstractServerConnectionRelatedEntityPropertyMappings extends AbstractEntityPropertyMappings
{
	/**
	 * Constructor method.
	 * @param EntityPropertyMappingInterface ...$entityPropertyMappings The additional entity property mappings.
	 * @throws EntityPropertyMappingExistsException An entity property mapping with a specific property name already exists.
	 */
	public function __construct( EntityPropertyMappingInterface ...$entityPropertyMappings )
	{
		parent::__construct(
			new EntityPropertyMapping( 'serverConnectionId', null ),
			...$entityPropertyMappings
		);
	}
}
