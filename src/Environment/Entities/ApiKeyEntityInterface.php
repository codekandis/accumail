<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

/**
 * Represents the interface of any API key entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ApiKeyEntityInterface extends EntityInterface
{
	/**
	 * Gets the ID of the user.
	 * @return string The ID of the user.
	 */
	public function getUserId(): string;

	/**
	 * Sets the ID of the user.
	 * @param string $userId The ID of the user.
	 */
	public function setUserId( string $userId ): void;

	/**
	 * Gets the key.
	 * @return string The key.
	 */
	public function getKey(): string;

	/**
	 * Sets the key.
	 * @param string $key The key.
	 */
	public function setKey( string $key ): void;

	/**
	 * Gets the comment.
	 * @return string The comment.
	 */
	public function getComment(): string;

	/**
	 * Sets the comment.
	 * @param string $comment The comment.
	 */
	public function setComment( string $comment ): void;
}
