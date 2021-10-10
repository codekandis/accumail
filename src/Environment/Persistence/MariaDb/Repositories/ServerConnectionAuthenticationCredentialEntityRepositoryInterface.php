<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories;

use CodeKandis\AccuMail\Environment\Entities\Collections\ServerConnectionAuthenticationCredentialEntityCollectionInterface;
use CodeKandis\AccuMail\Environment\Entities\ServerConnectionAuthenticationCredentialEntityInterface;
use CodeKandis\AccuMail\Environment\Entities\ServerConnectionEntityInterface;

/**
 * Represents the interface of any repository of any server connection authentication credential entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ServerConnectionAuthenticationCredentialEntityRepositoryInterface
{
	/**
	 * Reads all server connection authentication credentials.
	 * @return ServerConnectionAuthenticationCredentialEntityCollectionInterface The server connection authentication credentials.
	 */
	public function readServerConnectionAuthenticationCredentials(): ServerConnectionAuthenticationCredentialEntityCollectionInterface;

	/**
	 * Reads a server connection authentication credential by its record ID.
	 * @param ServerConnectionAuthenticationCredentialEntityInterface $serverConnectionAuthenticationCredential The server connection authentication credential with the record ID to find.
	 * @return ?ServerConnectionAuthenticationCredentialEntityInterface The server connection authentication credential if found, otherwise null.
	 */
	public function readServerConnectionAuthenticationCredentialByRecordId( ServerConnectionAuthenticationCredentialEntityInterface $serverConnectionAuthenticationCredential ): ?ServerConnectionAuthenticationCredentialEntityInterface;

	/**
	 * Reads a server connection authentication credential by its ID.
	 * @param ServerConnectionAuthenticationCredentialEntityInterface $serverConnectionAuthenticationCredential The server connection authentication credential with the ID to find.
	 * @return ?ServerConnectionAuthenticationCredentialEntityInterface The server connection authentication credential if found, otherwise null.
	 */
	public function readServerConnectionAuthenticationCredentialById( ServerConnectionAuthenticationCredentialEntityInterface $serverConnectionAuthenticationCredential ): ?ServerConnectionAuthenticationCredentialEntityInterface;

	/**
	 * Reads a server connection authentication credential by a server connection ID.
	 * @param ServerConnectionEntityInterface $serverConnection The server connection with the ID to find.
	 * @return ?ServerConnectionAuthenticationCredentialEntityInterface The server connection authentication credential if found, otherwise null.
	 */
	public function readServerConnectionAuthenticationCredentialByServerConnectionId( ServerConnectionEntityInterface $serverConnection ): ?ServerConnectionAuthenticationCredentialEntityInterface;

	/**
	 * Creates a server connection authentication credential by its server connection ID.
	 * @param ServerConnectionAuthenticationCredentialEntityInterface $serverConnectionAuthenticationCredential The server connection authentication credential to create.
	 * @param ServerConnectionEntityInterface $serverConnection The server connection with the server connection ID.
	 * @return ServerConnectionAuthenticationCredentialEntityInterface The server connection authentication credential with the record ID of the created server connection authentication credential.
	 */
	public function createServerConnectionAuthenticationCredentialByServerConnectionId( ServerConnectionAuthenticationCredentialEntityInterface $serverConnectionAuthenticationCredential, ServerConnectionEntityInterface $serverConnection ): ServerConnectionAuthenticationCredentialEntityInterface;
}
