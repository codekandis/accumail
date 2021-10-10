<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

/**
 * Represents an API key entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class ApiKeyEntity extends AbstractEntity implements ApiKeyEntityInterface
{
	/**
	 * Stores the ID of the user.
	 * @var string
	 */
	public string $userId = '';

	/**
	 * Stores the key.
	 * @var string
	 */
	public string $key = '';

	/**
	 * Stores the comment.
	 * @var string
	 */
	public string $comment = '';

	/**
	 * {@inheritDoc}
	 */
	public function getUserId(): string
	{
		return $this->userId;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setUserId( string $userId ): void
	{
		$this->userId = $userId;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getKey(): string
	{
		return $this->key;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setKey( string $key ): void
	{
		$this->key = $key;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getComment(): string
	{
		return $this->comment;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setComment( string $comment ): void
	{
		$this->comment = $comment;
	}
}
