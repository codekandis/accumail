<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Errors;

/**
 * Represents an enumeration of error messages of users errors.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class UsersErrorMessages
{
	/**
	 * Represents an error if a user does not exist.
	 * @var string
	 */
	public const USER_UNKNOWN = 'The requested user does not exist.';
}
