<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

/**
 * Represents the interface of any user entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface UserEntityInterface extends EntityInterface
{
	/**
	 * Gets wheter the user is active.
	 * @return bool True if the user is active, false otherwise.
	 */
	public function getIsActive(): bool;

	/**
	 * Sets wheter the user is active.
	 * @param bool $isActive True if the user is active, false otherwise.
	 */
	public function setIsActive( bool $isActive ): void;

	/**
	 * Gets the name.
	 * @return string The name.
	 */
	public function getName(): string;

	/**
	 * Sets the name.
	 * @param string $name The name.
	 */
	public function setName( string $name ): void;

	/**
	 * Gets the email.
	 * @return string The email.
	 */
	public function getEmail(): string;

	/**
	 * Sets the email.
	 * @param string $email The email.
	 */
	public function setEmail( string $email ): void;
}
