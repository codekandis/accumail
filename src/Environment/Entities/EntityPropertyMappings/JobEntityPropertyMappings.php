<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities\EntityPropertyMappings;

use CodeKandis\AccuMail\Environment\Entities\Enumerations\DateTimeFormats;
use CodeKandis\Tiphy\Converters\BiDirectionalConverters\DateTimeImmutableToStringBiDirectionalConverter;
use CodeKandis\Tiphy\Converters\BiDirectionalConverters\NullableDateTimeImmutableToNullableStringBiDirectionalConverter;
use CodeKandis\Tiphy\Entities\EntityPropertyMappings\EntityPropertyMapping;
use CodeKandis\Tiphy\Entities\EntityPropertyMappings\EntityPropertyMappingExistsException;

/**
 * Represents the entity property mappings of the job entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class JobEntityPropertyMappings extends AbstractEntityPropertyMappings
{
	/**
	 * Constructor method.
	 * @throws EntityPropertyMappingExistsException An entity property mapping with a specific property name already exists.
	 */
	public function __construct()
	{
		parent::__construct(
			new EntityPropertyMapping( 'status', null ),
			new EntityPropertyMapping( 'timestampCreated', new DateTimeImmutableToStringBiDirectionalConverter( DateTimeFormats::LONG ) ),
			new EntityPropertyMapping( 'timestampSent', new NullableDateTimeImmutableToNullableStringBiDirectionalConverter( DateTimeFormats::LONG ) ),
			new EntityPropertyMapping( 'timestampFailed', new NullableDateTimeImmutableToNullableStringBiDirectionalConverter( DateTimeFormats::LONG ) )
		);
	}
}
