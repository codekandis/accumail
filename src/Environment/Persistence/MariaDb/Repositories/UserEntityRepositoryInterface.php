<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories;

use CodeKandis\AccuMail\Environment\Entities\PersistableUserEntityInterface;
use CodeKandis\AccuMailEntities\ApiKeyEntityInterface;
use CodeKandis\AccuMailEntities\Collections\UserEntityCollectionInterface;
use CodeKandis\AccuMailEntities\JobEntityInterface;
use CodeKandis\AccuMailEntities\UserEntityInterface;

/**
 * Represents the interface of any repository of any user entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface UserEntityRepositoryInterface
{
	/**
	 * Reads all users.
	 * @return UserEntityCollectionInterface The users.
	 */
	public function readUsers(): UserEntityCollectionInterface;

	/**
	 * Reads a user by its record ID.
	 * @param PersistableUserEntityInterface $user The user with the record ID to find.
	 * @return ?UserEntityInterface The user if found, otherwise null.
	 */
	public function readUserByRecordId( PersistableUserEntityInterface $user ): ?UserEntityInterface;

	/**
	 * Reads a user by its ID.
	 * @param UserEntityInterface $user The user with the ID to find.
	 * @return ?UserEntityInterface The user if found, otherwise null.
	 */
	public function readUserById( UserEntityInterface $user ): ?UserEntityInterface;

	/**
	 * Reads a user by its ID.
	 * @param ApiKeyEntityInterface $apiKey The API key to find.
	 * @return ?UserEntityInterface The user if found, otherwise null.
	 */
	public function readUserByApiKey( ApiKeyEntityInterface $apiKey ): ?UserEntityInterface;

	/**
	 * Reads a user by a job ID.
	 * @param JobEntityInterface $job The job with the ID to find.
	 * @return ?UserEntityInterface The user if found, otherwise null.
	 */
	public function readUserByJobId( JobEntityInterface $job ): ?UserEntityInterface;
}
