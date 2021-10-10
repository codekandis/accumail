<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Errors;

/**
 * Represents an enumeration of error codes of users errors.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class UsersErrorCodes
{
	/**
	 * Represents an error if a user does not exist.
	 * @var int
	 */
	public const USER_UNKNOWN = 30001;
}
