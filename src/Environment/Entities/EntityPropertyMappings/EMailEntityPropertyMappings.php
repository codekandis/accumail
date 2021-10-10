<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities\EntityPropertyMappings;

use CodeKandis\Tiphy\Entities\EntityPropertyMappings\EntityPropertyMapping;
use CodeKandis\Tiphy\Entities\EntityPropertyMappings\EntityPropertyMappingExistsException;

/**
 * Represents the entity property mappings of the e-mail entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class EMailEntityPropertyMappings extends AbstractJobRelatedEntityPropertyMappings
{
	/**
	 * Constructor method.
	 * @throws EntityPropertyMappingExistsException An entity property mapping with a specific property name already exists.
	 */
	public function __construct()
	{
		parent::__construct(
			new EntityPropertyMapping( 'subject', null ),
			new EntityPropertyMapping( 'plainTextBody', null ),
			new EntityPropertyMapping( 'htmlBody', null ),
			new EntityPropertyMapping( 'attachments', null )
		);
	}
}
