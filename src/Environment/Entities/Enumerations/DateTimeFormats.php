<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities\Enumerations;

/**
 * Represents an enumeration of date time formats.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class DateTimeFormats
{
	/**
	 * Represents the long date time format.
	 * @var string
	 */
	public const LONG = 'Y-m-d H:i:s.u';
}
