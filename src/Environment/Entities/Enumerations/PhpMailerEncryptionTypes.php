<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities\Enumerations;

use PHPMailer\PHPMailer\PHPMailer;

/**
 * Represents an enumeration of PHPMailer encryption types.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class PhpMailerEncryptionTypes
{
	/**
	 * Represents the encryption type `NONE`.
	 * @var string
	 */
	public const NONE = '';

	/**
	 * Represents the encryption type `SSL`.
	 * @var string
	 */
	public const SSL = PHPMailer::ENCRYPTION_SMTPS;

	/**
	 * Represents the encryption type `TLS`.
	 * @var string
	 */
	public const TLS = PHPMailer::ENCRYPTION_STARTTLS;
}
