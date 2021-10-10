<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities\Enumerations;

/**
 * Represents an enumeration of e-mail types.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class EMailTypes
{
	/**
	 * Represents the e-mail type of a `FROM` e-mail address.
	 * @var string
	 */
	public const FROM = 'FROM';

	/**
	 * Represents the e-mail type of a `TO` e-mail address.
	 * @var string
	 */
	public const TO = 'TO';

	/**
	 * Represents the e-mail type of a `CC` e-mail address.
	 * @var string
	 */
	public const CC = 'CC';

	/**
	 * Represents the e-mail type of a `BCC` e-mail address.
	 * @var string
	 */
	public const BCC = 'BCC';
}
