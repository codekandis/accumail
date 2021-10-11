<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

/**
 * Represents the interface of any e-mail address entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface EMailAddressEntityInterface extends EMailRelatedEntityInterface
{
	/**
	 * Gets the type.
	 * @return string The type.
	 */
	public function getType(): string;

	/**
	 * Sets the type.
	 * @param string $type The type.
	 */
	public function setType( string $type ): void;

	/**
	 * Gets the name of the owner.
	 * @return string The name of the owner.
	 */
	public function getName(): string;

	/**
	 * Sets the name of the owner.
	 * @param string $name The name of the owner.
	 */
	public function setName( string $name ): void;

	/**
	 * Gets the address.
	 * @return string The address.
	 */
	public function getAddress(): string;

	/**
	 * Sets the address.
	 * @param string $address The address.
	 */
	public function setAddress( string $address ): void;
}
