<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities\EntityPropertyMappings;

use CodeKandis\Tiphy\Entities\EntityPropertyMappings\EntityPropertyMapping;
use CodeKandis\Tiphy\Entities\EntityPropertyMappings\EntityPropertyMappingExistsException;

/**
 * Represents the entity property mappings of the e-mail address entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class EMailAddressEntityPropertyMappings extends AbstractEMailRelatedEntityPropertyMappings
{
	/**
	 * Constructor method.
	 * @throws EntityPropertyMappingExistsException An entity property mapping with a specific property name already exists.
	 */
	public function __construct()
	{
		parent::__construct(
			new EntityPropertyMapping( 'type', null ),
			new EntityPropertyMapping( 'name', null ),
			new EntityPropertyMapping( 'address', null )
		);
	}
}
