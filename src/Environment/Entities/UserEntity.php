<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

/**
 * Represents a user entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class UserEntity extends AbstractEntity implements UserEntityInterface
{
	/**
	 * Stores wheter the user is active.
	 * @var bool
	 */
	public bool $isActive = false;

	/**
	 * Stores the name.
	 * @var string
	 */
	public string $name = '';

	/**
	 * Stores the email of the user.
	 * @var string
	 */
	public string $email = '';

	/**
	 * {@inheritDoc}
	 */
	public function getIsActive(): bool
	{
		return $this->isActive;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setIsActive( bool $isActive ): void
	{
		$this->isActive = $isActive;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setName( string $name ): void
	{
		$this->name = $name;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getEmail(): string
	{
		return $this->email;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setEmail( string $email ): void
	{
		$this->email = $email;
	}
}
