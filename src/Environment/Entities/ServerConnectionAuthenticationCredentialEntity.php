<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

/**
 * Represents a server connection authentication credential entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class ServerConnectionAuthenticationCredentialEntity extends AbstractServerConnectionRelatedEntity implements ServerConnectionAuthenticationCredentialEntityInterface
{
	/**
	 * Stores the username.
	 * @var string
	 */
	public string $username = '';

	/**
	 * Stores the password.
	 * @var string
	 */
	public string $password = '';

	/**
	 * {@inheritDoc}
	 */
	public function getUsername(): string
	{
		return $this->username;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setUsername( string $username ): void
	{
		$this->username = $username;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getPassword(): string
	{
		return $this->password;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setPassword( string $password ): void
	{
		$this->password = $password;
	}
}
