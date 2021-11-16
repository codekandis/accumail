<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories;

use CodeKandis\AccuMail\Environment\Entities\PersistableServerConnectionEntityInterface;
use CodeKandis\AccuMailEntities\Collections\ServerConnectionEntityCollectionInterface;
use CodeKandis\AccuMailEntities\JobEntityInterface;
use CodeKandis\AccuMailEntities\ServerConnectionEntityInterface;

/**
 * Represents the interface of any repository of any server connection entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ServerConnectionEntityRepositoryInterface
{
	/**
	 * Reads all server connections.
	 * @return ServerConnectionEntityCollectionInterface The server connections.
	 */
	public function readServerConnections(): ServerConnectionEntityCollectionInterface;

	/**
	 * Reads a server connection by its record ID.
	 * @param PersistableServerConnectionEntityInterface $serverConnection The server connection with the record ID to find.
	 * @return ?ServerConnectionEntityInterface The server connection if found, otherwise null.
	 */
	public function readServerConnectionByRecordId( PersistableServerConnectionEntityInterface $serverConnection ): ?ServerConnectionEntityInterface;

	/**
	 * Reads a server connection by its ID.
	 * @param ServerConnectionEntityInterface $serverConnection The server connection with the ID to find.
	 * @return ?ServerConnectionEntityInterface The server connection if found, otherwise null.
	 */
	public function readServerConnectionById( ServerConnectionEntityInterface $serverConnection ): ?ServerConnectionEntityInterface;

	/**
	 * Reads a server connection by a job ID.
	 * @param JobEntityInterface $job The job with the ID to find.
	 * @return ?ServerConnectionEntityInterface The server connection if found, otherwise null.
	 */
	public function readServerConnectionByJobId( JobEntityInterface $job ): ?ServerConnectionEntityInterface;

	/**
	 * Creates a server connection by its job ID.
	 * @param ServerConnectionEntityInterface $serverConnection The server connection to create.
	 * @param JobEntityInterface $job The job with the job ID.
	 * @return PersistableServerConnectionEntityInterface The server connection with the record ID of the created server connection.
	 */
	public function createServerConnectionByJobId( ServerConnectionEntityInterface $serverConnection, JobEntityInterface $job ): PersistableServerConnectionEntityInterface;
}
