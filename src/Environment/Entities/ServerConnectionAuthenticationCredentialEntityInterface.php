<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

/**
 * Represents the interface of any server connection authentication credential entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ServerConnectionAuthenticationCredentialEntityInterface extends ServerConnectionRelatedEntityInterface
{
	/**
	 * Gets the username.
	 * @return string The username.
	 */
	public function getUsername(): string;

	/**
	 * Sets the username.
	 * @param string $username The username.
	 */
	public function setUsername( string $username ): void;

	/**
	 * Gets the password.
	 * @return string The password.
	 */
	public function getPassword(): string;

	/**
	 * Sets the password.
	 * @param string $password The password.
	 */
	public function setPassword( string $password ): void;
}
