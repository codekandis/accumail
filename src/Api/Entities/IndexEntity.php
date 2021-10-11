<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Api\Entities;

use CodeKandis\Tiphy\Entities\AbstractEntity;

/**
 * Represents an index entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class IndexEntity extends AbstractEntity implements IndexEntityInterface
{
	/**
	 * Stores the canonical URI of the index.
	 * @var string
	 */
	public string $canonicalUri = '';

	/**
	 * Stores the URI of the users.
	 * @var string
	 */
	public string $usersUri = '';

	/**
	 * Stores the URI of the API keys.
	 * @var string
	 */
	public string $apiKeysUri = '';

	/**
	 * Stores the URI of the jobs.
	 * @var string
	 */
	public string $jobsUri = '';

	/**
	 * Stores the URI of the jobs which has been created.
	 * @var string
	 */
	public string $jobsCreatedUri = '';

	/**
	 * Stores the URI of the jobs which has been succeeded to send.
	 * @var string
	 */
	public string $jobsSentSucceededUri = '';

	/**
	 * Stores the URI of the jobs which has been failed to send.
	 * @var string
	 */
	public string $jobsSentFailedUri = '';

	/**
	 * Stores the URI of the server connections.
	 * @var string
	 */
	public string $serverConnectionsUri = '';

	/**
	 * Stores the URI of the server connection authentication credentials.
	 * @var string
	 */
	public string $serverConnectionAuthenticationCredentialsUri = '';

	/**
	 * Stores the URI of the e-mails.
	 * @var string
	 */
	public string $eMailsUri = '';

	/**
	 * Stores the URI of the e-mail addresses.
	 * @var string
	 */
	public string $eMailAddressesUri = '';

	/**
	 * Stores the URI of the e-mail attachments.
	 * @var string
	 */
	public string $eMailAttachmentsUri = '';

	/**
	 * {@inheritDoc}
	 */
	public function getCanonicalUri(): string
	{
		return $this->canonicalUri;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setCanonicalUri( string $canonicalUri ): void
	{
		$this->canonicalUri = $canonicalUri;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getUsersUri(): string
	{
		return $this->usersUri;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setUsersUri( string $usersUri ): void
	{
		$this->usersUri = $usersUri;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getApiKeysUri(): string
	{
		return $this->apiKeysUri;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setApiKeysUri( string $apiKeysUri ): void
	{
		$this->apiKeysUri = $apiKeysUri;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getJobsUri(): string
	{
		return $this->jobsUri;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setJobsUri( string $jobsUri ): void
	{
		$this->jobsUri = $jobsUri;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getJobsCreatedUri(): string
	{
		return $this->jobsCreatedUri;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setJobsCreatedUri( string $jobsCreatedUri ): void
	{
		$this->jobsCreatedUri = $jobsCreatedUri;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getJobsSentSucceededUri(): string
	{
		return $this->jobsSentSucceededUri;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setJobsSentSucceededUri( string $jobsSentSucceededUri ): void
	{
		$this->jobsSentSucceededUri = $jobsSentSucceededUri;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getJobsSentFailedUri(): string
	{
		return $this->jobsSentFailedUri;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setJobsSentFailedUri( string $jobsSentFailedUri ): void
	{
		$this->jobsSentFailedUri = $jobsSentFailedUri;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getServerConnectionsUri(): string
	{
		return $this->serverConnectionsUri;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setServerConnectionsUri( string $serverConnectionsUri ): void
	{
		$this->serverConnectionsUri = $serverConnectionsUri;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getServerConnectionAuthenticationCredentialsUri(): string
	{
		return $this->serverConnectionAuthenticationCredentialsUri;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setServerConnectionAuthenticationCredentialsUri( string $serverConnectionAuthenticationCredentialsUri ): void
	{
		$this->serverConnectionAuthenticationCredentialsUri = $serverConnectionAuthenticationCredentialsUri;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getEMailsUri(): string
	{
		return $this->eMailsUri;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setEMailsUri( string $eMailsUri ): void
	{
		$this->eMailsUri = $eMailsUri;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getEMailAddressesUri(): string
	{
		return $this->eMailAddressesUri;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setEMailAddressesUri( string $eMailAddressesUri ): void
	{
		$this->eMailAddressesUri = $eMailAddressesUri;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getEMailAttachmentsUri(): string
	{
		return $this->eMailAttachmentsUri;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setEMailAttachmentsUri( string $eMailAttachmentsUri ): void
	{
		$this->eMailAttachmentsUri = $eMailAttachmentsUri;
	}
}
