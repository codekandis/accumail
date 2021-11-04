<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Api\Actions\Get;

use CodeKandis\AccuMailEntities\Enumerations\JobStatuses;
use CodeKandis\AccuMailEntities\JobEntity;
use CodeKandis\AccuMailEntities\JobEntityInterface;

/**
 * Represents the action to get all jobs which has been created.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class JobsCreatedAction extends AbstractJobsByStatusAction
{
	/**
	 * {@inheritDoc}
	 */
	protected function getRequestedJob(): JobEntityInterface
	{
		return JobEntity::fromArray(
			[
				'status' => JobStatuses::CREATED
			]
		);
	}
}
