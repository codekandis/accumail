<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

/**
 * Represents the interface of any server connection entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ServerConnectionEntityInterface extends JobRelatedEntityInterface
{
	/**
	 * Gets the host.
	 * @return string The host.
	 */
	public function getHost(): string;

	/**
	 * Sets the host.
	 * @param string $host The host.
	 */
	public function setHost( string $host ): void;

	/**
	 * Gets the port.
	 * @return string The port.
	 */
	public function getPort(): string;

	/**
	 * Sets the port.
	 * @param string $port The port.
	 */
	public function setPort( string $port ): void;

	/**
	 * Gets the encryption type.
	 * @return string The encryption type.
	 */
	public function getEncryptionType(): string;

	/**
	 * Sets the encryption type.
	 * @param string $encryptionType The encryption type.
	 */
	public function setEncryptionType( string $encryptionType ): void;

	/**
	 * Gets the authentication credential.
	 * @return ?ServerConnectionAuthenticationCredentialEntityInterface The authentication credential.
	 */
	public function getAuthenticationCredential(): ?ServerConnectionAuthenticationCredentialEntityInterface;

	/**
	 * Sets the authentication credential.
	 * @param ?ServerConnectionAuthenticationCredentialEntityInterface $authenticationCredential The authentication credential.
	 */
	public function setAuthenticationCredential( ?ServerConnectionAuthenticationCredentialEntityInterface $authenticationCredential ): void;
}
