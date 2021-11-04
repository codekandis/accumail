<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Api\Entities\UriExtenders;

use CodeKandis\AccuMail\Api\Http\UriBuilders\ApiUriBuilderInterface;
use CodeKandis\AccuMailEntities\JobEntityInterface;

/**
 * Represents an API URI extender of any job.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class JobApiUriExtender extends AbstractApiUriExtender
{
	/**
	 * Stores the job to extend its URIs.
	 * @var JobEntityInterface
	 */
	private JobEntityInterface $job;

	/**
	 * Constructor method.
	 * @param ApiUriBuilderInterface $apiUriBuilder The API URI builder the API URI extender depends on.
	 * @param JobEntityInterface $job The job to extend its URIs.
	 */
	public function __construct( ApiUriBuilderInterface $apiUriBuilder, JobEntityInterface $job )
	{
		parent::__construct( $apiUriBuilder );

		$this->job = $job;
	}

	/**
	 * {@inheritDoc}
	 */
	public function extend(): void
	{
		$this->addCanonicalUri();
		$this->addUserUri();
		$this->addServerConnectionUri();
		$this->addEMailUri();
	}

	/**
	 * Adds the canonical URI of the job.
	 */
	private function addCanonicalUri(): void
	{
		$this->job->setCanonicalUri(
			$this->apiUriBuilder->buildJobUri(
				$this->job->getId()
			)
		);
	}

	/**
	 * Adds the canonical URI of the job's user.
	 */
	private function addUserUri(): void
	{
		( new UserApiUriExtender(
			$this->apiUriBuilder, $this->job->getUser()
		) )
			->extend();
	}

	/**
	 * Adds the canonical URI of the job's server connection.
	 */
	private function addServerConnectionUri(): void
	{
		( new ServerConnectionApiUriExtender(
			$this->apiUriBuilder, $this->job->getServerConnection()
		) )
			->extend();
	}

	/**
	 * Adds the canonical URI of the job's e-mail.
	 */
	private function addEMailUri(): void
	{
		( new EMailApiUriExtender(
			$this->apiUriBuilder, $this->job->getEMail()
		) )
			->extend();
	}
}
