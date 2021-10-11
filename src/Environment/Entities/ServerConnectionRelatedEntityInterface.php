<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

/**
 * Represents the interface of any server connection related entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ServerConnectionRelatedEntityInterface extends EntityInterface
{
	/**
	 * Gets the server connection ID.
	 * @return string The server connection ID.
	 */
	public function getServerConnectionId(): string;

	/**
	 * Sets the server connection ID.
	 * @param string $serverConnectionId The server connection ID.
	 */
	public function setServerConnectionId( string $serverConnectionId ): void;
}
