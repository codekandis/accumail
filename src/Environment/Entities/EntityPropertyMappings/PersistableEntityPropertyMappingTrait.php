<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities\EntityPropertyMappings;

use CodeKandis\Entities\EntityPropertyMappings\EntityPropertyMapping;
use CodeKandis\Entities\EntityPropertyMappings\EntityPropertyMappingExistsException;

/**
 * Represents trait of any persistable entity property mapping.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
trait PersistableEntityPropertyMappingTrait
{
	/**
	 * Constructor method.
	 * @throws EntityPropertyMappingExistsException An entity property mapping with a specific property name already exists.
	 */
	public function __construct()
	{
		parent::__construct(
			new EntityPropertyMapping( '_id', null ),
		);
	}
}
