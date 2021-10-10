<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

/**
 * Represents a server connection entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class ServerConnectionEntity extends AbstractJobRelatedEntity implements ServerConnectionEntityInterface
{
	/**
	 * Stores the host.
	 * @var string
	 */
	public string $host = '';

	/**
	 * Stores the port.
	 * @var string
	 */
	public string $port = '';

	/**
	 * Stores the encryption type.
	 * @var string
	 */
	public string $encryptionType = '';

	/**
	 * Stores the authentication credential.
	 * @var ?ServerConnectionAuthenticationCredentialEntityInterface
	 */
	public ?ServerConnectionAuthenticationCredentialEntityInterface $authenticationCredential = null;

	/**
	 * {@inheritDoc}
	 */
	public function getHost(): string
	{
		return $this->host;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setHost( string $host ): void
	{
		$this->host = $host;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getPort(): string
	{
		return $this->port;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setPort( string $port ): void
	{
		$this->port = $port;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getEncryptionType(): string
	{
		return $this->encryptionType;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setEncryptionType( string $encryptionType ): void
	{
		$this->encryptionType = $encryptionType;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getAuthenticationCredential(): ?ServerConnectionAuthenticationCredentialEntityInterface
	{
		return $this->authenticationCredential;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setAuthenticationCredential( ?ServerConnectionAuthenticationCredentialEntityInterface $authenticationCredential ): void
	{
		$this->authenticationCredential = $authenticationCredential;
	}
}
