<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories;

use CodeKandis\AccuMail\Environment\Entities\PersistableJobEntityInterface;
use CodeKandis\AccuMailEntities\Collections\JobEntityCollectionInterface;
use CodeKandis\AccuMailEntities\JobEntityInterface;
use CodeKandis\AccuMailEntities\UserEntityInterface;

/**
 * Represents the interface of any repository of any job entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface JobEntityRepositoryInterface
{
	/**
	 * Reads all jobs.
	 * @return JobEntityCollectionInterface The jobs.
	 */
	public function readJobs(): JobEntityCollectionInterface;

	/**
	 * Reads all jobs by their status.
	 * @param JobEntityInterface $job The job with the status to find.
	 * @return JobEntityCollectionInterface The jobs.
	 */
	public function readJobsByStatus( JobEntityInterface $job ): JobEntityCollectionInterface;

	/**
	 * Reads a job by its record ID.
	 * @param PersistableJobEntityInterface $job The job with the record ID to find.
	 * @return ?JobEntityInterface The job if found, otherwise null.
	 */
	public function readJobByRecordId( PersistableJobEntityInterface $job ): ?JobEntityInterface;

	/**
	 * Reads a job by its ID.
	 * @param JobEntityInterface $job The job with the ID to find.
	 * @return ?JobEntityInterface The job if found, otherwise null.
	 */
	public function readJobById( JobEntityInterface $job ): ?JobEntityInterface;

	/**
	 * Creates a job by its user ID.
	 * @param JobEntityInterface $job The job to create.
	 * @param UserEntityInterface $user The user creating the job.
	 * @return PersistableJobEntityInterface The job with the record ID of the created job.
	 */
	public function createJobByUserId( JobEntityInterface $job, UserEntityInterface $user ): PersistableJobEntityInterface;

	/**
	 * Updates the status of a job.
	 * @param JobEntityInterface $job The job to update its status.
	 */
	public function updateJobStatus( JobEntityInterface $job ): void;
}
