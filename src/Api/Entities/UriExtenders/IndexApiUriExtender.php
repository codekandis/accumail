<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Api\Entities\UriExtenders;

use CodeKandis\AccuMail\Api\Entities\IndexEntityInterface;
use CodeKandis\AccuMail\Api\Http\UriBuilders\ApiUriBuilderInterface;

/**
 * Represents an API URI extender of an index.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class IndexApiUriExtender extends AbstractApiUriExtender
{
	/**
	 * Stores the index to extends its URIs.
	 * @var IndexEntityInterface
	 */
	private IndexEntityInterface $index;

	/**
	 * Constructor method.
	 * @param ApiUriBuilderInterface $apiUriBuilder The API URI builder the API URI extender depends on.
	 * @param IndexEntityInterface $index The index to extend its URIs.
	 */
	public function __construct( ApiUriBuilderInterface $apiUriBuilder, IndexEntityInterface $index )
	{
		parent::__construct( $apiUriBuilder );

		$this->index = $index;
	}

	/**
	 * {@inheritDoc}
	 */
	public function extend(): void
	{
		$this->addCanonicalUri();
		$this->addUsersUri();
		$this->addApiKeysUri();
		$this->addJobsUri();
		$this->addJobsCreatedUri();
		$this->addJobsSentSucceededUri();
		$this->addJobsSentFailedUri();
		$this->addServerConnectionsUri();
		$this->addServerConnectionAuthenticationCredentialsUri();
		$this->addEMailsUri();
		$this->addEMailAddressesUri();
		$this->addEMailAttachmentsUri();
	}

	/**
	 * Adds the canonical URI of the index.
	 */
	private function addCanonicalUri(): void
	{
		$this->index->setCanonicalUri(
			$this->apiUriBuilder->buildIndexUri()
		);
	}

	/**
	 * Adds the URI of the users.
	 */
	private function addUsersUri(): void
	{
		$this->index->setUsersUri(
			$this->apiUriBuilder->buildUsersUri()
		);
	}

	/**
	 * Adds the URI of the API keys.
	 */
	private function addApiKeysUri(): void
	{
		$this->index->setApiKeysUri(
			$this->apiUriBuilder->buildApiKeysUri()
		);
	}

	/**
	 * Adds the URI of the jobs.
	 */
	private function addJobsUri(): void
	{
		$this->index->setJobsUri(
			$this->apiUriBuilder->buildJobsUri()
		);
	}

	/**
	 * Adds the URI of the jobs which has been created.
	 */
	private function addJobsCreatedUri(): void
	{
		$this->index->setJobsCreatedUri(
			$this->apiUriBuilder->buildJobsCreatedUri()
		);
	}

	/**
	 * Adds the URI of the jobs which has been succeeded to send.
	 */
	private function addJobsSentSucceededUri(): void
	{
		$this->index->setJobsSentSucceededUri(
			$this->apiUriBuilder->buildJobsSentSucceededUri()
		);
	}

	/**
	 * Adds the URI of the jobs which has been failed to send.
	 */
	private function addJobsSentFailedUri(): void
	{
		$this->index->setJobsSentFailedUri(
			$this->apiUriBuilder->buildJobsSentFailedUri()
		);
	}

	/**
	 * Adds the URI of the server connections.
	 */
	private function addServerConnectionsUri(): void
	{
		$this->index->setServerConnectionsUri(
			$this->apiUriBuilder->buildServerConnectionsUri()
		);
	}

	/**
	 * Adds the URI of the server connection authentication credentials.
	 */
	private function addServerConnectionAuthenticationCredentialsUri(): void
	{
		$this->index->setServerConnectionAuthenticationCredentialsUri(
			$this->apiUriBuilder->buildServerConnectionAuthenticationCredentialsUri()
		);
	}

	/**
	 * Adds the URI of the e-mails.
	 */
	private function addEMailsUri(): void
	{
		$this->index->setEMailsUri(
			$this->apiUriBuilder->buildEMailsUri()
		);
	}

	/**
	 * Adds the URI of the e-mail addresses.
	 */
	private function addEMailAddressesUri(): void
	{
		$this->index->setEMailAddressesUri(
			$this->apiUriBuilder->buildEMailAddressesUri()
		);
	}

	/**
	 * Adds the URI of the e-mail attachments.
	 */
	private function addEMailAttachmentsUri(): void
	{
		$this->index->setEMailAttachmentsUri(
			$this->apiUriBuilder->buildEMailAttachmentsUri()
		);
	}
}
