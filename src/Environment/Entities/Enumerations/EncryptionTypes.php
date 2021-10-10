<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities\Enumerations;

/**
 * Represents an enumeration of encryption types.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class EncryptionTypes
{
	/**
	 * Represents the encryption type `NONE`.
	 * @var string
	 */
	public const NONE = 'NONE';

	/**
	 * Represents the encryption type `SSL`.
	 * @var string
	 */
	public const SSL = 'SSL';

	/**
	 * Represents the encryption type `TLS`.
	 * @var string
	 */
	public const TLS = 'TLS';
}
