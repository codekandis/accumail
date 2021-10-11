<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Errors;

/**
 * Represents an enumeration of common error codes.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class CommonErrorCodes
{
	/**
	 * Represents an internal error.
	 * @var int
	 */
	public const INTERNAL_ERROR = 1;

	/**
	 * Represents an error if a content type is invalid.
	 * @var int
	 */
	public const INVALID_CONTENT_TYPE = 2;

	/**
	 * Represents an error if a request body is malformed.
	 * @var int
	 */
	public const MALFORMED_REQUEST_BODY = 3;

	/**
	 * Represents an error if a request body is invalid.
	 * @var int
	 */
	public const INVALID_REQUEST_BODY = 4;
}
