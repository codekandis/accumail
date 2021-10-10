<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities\Collections;

use CodeKandis\AccuMail\Environment\Entities\EntityInterface;
use CodeKandis\AccuMail\Environment\Entities\JobEntityInterface;

/**
 * Represents the interface of any collection of job entities.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface JobEntityCollectionInterface extends EntityCollectionInterface
{
	/**
	 * Gets the current job.
	 * @return JobEntityInterface The current job.
	 */
	public function current(): EntityInterface;

	/**
	 * Gets the job at the specified index.
	 * @param int $index The index of the job.
	 * @return JobEntityInterface The job to get.
	 */
	public function offsetGet( $index ): EntityInterface;
}
