<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

/**
 * Represents the interface of any job related entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface JobRelatedEntityInterface extends EntityInterface
{
	/**
	 * Gets the job ID.
	 * @return string The job ID.
	 */
	public function getJobId(): string;

	/**
	 * Sets the job ID.
	 * @param string $jobId The job ID.
	 */
	public function setJobId( string $jobId ): void;
}
