<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Api\Entities;

use CodeKandis\Entities\EntityInterface;

/**
 * Represents the interface of all index entities.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface IndexEntityInterface extends EntityInterface
{
	/**
	 * Gets the canonical URI of the index.
	 * @return string The canonical URI of the index.
	 */
	public function getCanonicalUri(): string;

	/**
	 * Sets the canonical URI of the index.
	 * @param string $canonicalUri The canonical URI of the index.
	 */
	public function setCanonicalUri( string $canonicalUri ): void;

	/**
	 * Gets the URI of the users.
	 * @return string The URI of the users.
	 */
	public function getUsersUri(): string;

	/**
	 * Sets the URI of the users.
	 * @param string $usersUri The URI of the users.
	 */
	public function setUsersUri( string $usersUri ): void;

	/**
	 * Gets the URI of the users.
	 * @return string The URI of the users.
	 */
	public function getApiKeysUri(): string;

	/**
	 * Sets the URI of the API keys.
	 * @param string $apiKeysUri The URI of the API keys.
	 */
	public function setApiKeysUri( string $apiKeysUri ): void;

	/**
	 * Gets the URI of the jobs.
	 * @return string The URI of the jobs.
	 */
	public function getJobsUri(): string;

	/**
	 * Sets the URI of the jobs.
	 * @param string $jobsUri The URI of the jobs.
	 */
	public function setJobsUri( string $jobsUri ): void;

	/**
	 * Gets the URI of the jobs which has been created.
	 * @return string The URI of the jobs which has been created.
	 */
	public function getJobsCreatedUri(): string;

	/**
	 * Sets the URI of the jobs which has been created.
	 * @param string $jobsCreatedUri The URI of the jobs which has been created.
	 */
	public function setJobsCreatedUri( string $jobsCreatedUri ): void;

	/**
	 * Gets the URI of the jobs which has been to succeeded to send.
	 * @return string The URI of the jobs which has been succeeded to send.
	 */
	public function getJobsSentSucceededUri(): string;

	/**
	 * Sets the URI of the jobs which has been succeeded to send.
	 * @param string $jobsSentSucceededUri The URI of the jobs which has been succeeded to send.
	 */
	public function setJobsSentSucceededUri( string $jobsSentSucceededUri ): void;

	/**
	 * Gets the URI of the jobs which has been failed to send.
	 * @return string The URI of the jobs which has been failed to send.
	 */
	public function getJobsSentFailedUri(): string;

	/**
	 * Sets the URI of the jobs which has been failed to send.
	 * @param string $jobsSentFailedUri The URI of the jobs which has been failed to send.
	 */
	public function setJobsSentFailedUri( string $jobsSentFailedUri ): void;

	/**
	 * Gets the URI of the server connections.
	 * @return string The URI of the server connections.
	 */
	public function getServerConnectionsUri(): string;

	/**
	 * Sets the URI of the server connections.
	 * @param string $serverConnectionsUri The URI of the server connections.
	 */
	public function setServerConnectionsUri( string $serverConnectionsUri ): void;

	/**
	 * Gets the URI of the server connection authentication credentials.
	 * @return string The URI of the server connection authentication credentials.
	 */
	public function getServerConnectionAuthenticationCredentialsUri(): string;

	/**
	 * Sets the URI of the server connection authentication credentials.
	 * @param string $serverConnectionAuthenticationCredentialsUri The URI of the server connection authentication credentials.
	 */
	public function setServerConnectionAuthenticationCredentialsUri( string $serverConnectionAuthenticationCredentialsUri ): void;

	/**
	 * Gets the URI of the e-mails.
	 * @return string The URI of the e-mails.
	 */
	public function getEMailsUri(): string;

	/**
	 * Sets the URI of the e-mails.
	 * @param string $eMailsUri The URI of the e-mails.
	 */
	public function setEMailsUri( string $eMailsUri ): void;

	/**
	 * Gets the URI of the e-mail addresses.
	 * @return string The URI of the e-mail addresses.
	 */
	public function getEMailAddressesUri(): string;

	/**
	 * Sets the URI of the e-mail addresses.
	 * @param string $eMailAddressesUri The URI of the e-mail addresses.
	 */
	public function setEMailAddressesUri( string $eMailAddressesUri ): void;

	/**
	 * Gets the URI of the e-mail attachments.
	 * @return string The URI of the e-mail attachments.
	 */
	public function getEMailAttachmentsUri(): string;

	/**
	 * Sets the URI of the e-mail attachments.
	 * @param string $eMailAttachmentsUri The URI of the e-mail attachments.
	 */
	public function setEMailAttachmentsUri( string $eMailAttachmentsUri ): void;
}
