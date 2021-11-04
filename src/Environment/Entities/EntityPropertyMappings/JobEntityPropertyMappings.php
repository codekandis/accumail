<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities\EntityPropertyMappings;

use CodeKandis\AccuMail\Environment\Entities\Enumerations\DateTimeFormats;
use CodeKandis\Converters\BiDirectionalConverters\DateTimeImmutableToStringBiDirectionalConverter;
use CodeKandis\Converters\BiDirectionalConverters\NullableDateTimeImmutableToNullableStringBiDirectionalConverter;
use CodeKandis\Entities\EntityPropertyMappings\EntityPropertyMapping;
use CodeKandis\Entities\EntityPropertyMappings\EntityPropertyMappingExistsException;
use CodeKandis\Entities\EntityPropertyMappings\EntityPropertyMappingInterface;

/**
 * Represents the entity property mappings of the job entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class JobEntityPropertyMappings extends AbstractEntityPropertyMappings
{
	/**
	 * Constructor method.
	 * @param EntityPropertyMappingInterface ...$entityPropertyMappings The additional entity property mappings.
	 * @throws EntityPropertyMappingExistsException An entity property mapping with a specific property name already exists.
	 */
	public function __construct( EntityPropertyMappingInterface ...$entityPropertyMappings )
	{
		parent::__construct(
			new EntityPropertyMapping( 'status', null ),
			new EntityPropertyMapping( 'timestampCreated', new DateTimeImmutableToStringBiDirectionalConverter( DateTimeFormats::LONG ) ),
			new EntityPropertyMapping( 'timestampProcessed', new NullableDateTimeImmutableToNullableStringBiDirectionalConverter( DateTimeFormats::LONG ) ),
			...$entityPropertyMappings
		);
	}
}
