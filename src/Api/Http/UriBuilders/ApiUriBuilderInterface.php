<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Api\Http\UriBuilders;

/**
 * Represents the interface of any API URI builder.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ApiUriBuilderInterface
{
	/**
	 * Builds the URI of the index.
	 * @return string The URI of the index.
	 */
	public function buildIndexUri(): string;

	/**
	 * Builds the URI of the user.
	 * @return string The URI of the users.
	 */
	public function buildUsersUri(): string;

	/**
	 * Builds the URI of a specific user.
	 * @param string $userId The ID of the user.
	 * @return string The URI of the user.
	 */
	public function buildUserUri( string $userId ): string;

	/**
	 * Builds the URI of the API keys.
	 * @return string The URI of the API keys.
	 */
	public function buildApiKeysUri(): string;

	/**
	 * Builds the URI of a specific API key.
	 * @param string $apiKeyId The ID of the API key.
	 * @return string The URI of the API key.
	 */
	public function buildApiKeyUri( string $apiKeyId ): string;

	/**
	 * Builds the URI of the jobs.
	 * @return string The URI of the jobs.
	 */
	public function buildJobsUri(): string;

	/**
	 * Builds the URI of a specific job.
	 * @param string $jobId The ID of the job.
	 * @return string The URI of the job.
	 */
	public function buildJobUri( string $jobId ): string;

	/**
	 * Builds the URI of the jobs which has been created.
	 * @return string The URI of the jobs which has been created.
	 */
	public function buildJobsCreatedUri(): string;

	/**
	 * Builds the URI of the jobs which has been succeeded to send.
	 * @return string The URI of the jobs which has been succeeded to send.
	 */
	public function buildJobsSentSucceededUri(): string;

	/**
	 * Builds the URI of the jobs which has been failed to send.
	 * @return string The URI of the jobs which has been failed to send.
	 */
	public function buildJobsSentFailedUri(): string;

	/**
	 * Builds the URI of the server connections.
	 * @return string The URI of the server connections.
	 */
	public function buildServerConnectionsUri(): string;

	/**
	 * Builds the URI of a specific server connection.
	 * @param string $serverConnectionId The ID of the server connection.
	 * @return string The URI of the server connection.
	 */
	public function buildServerConnectionUri( string $serverConnectionId ): string;

	/**
	 * Builds the URI of the server connection authentication credentials.
	 * @return string The URI of the server connection authentication credentials.
	 */
	public function buildServerConnectionAuthenticationCredentialsUri(): string;

	/**
	 * Builds the URI of a specific server connection authentication credential.
	 * @param string $serverConnectionAuthenticationCredentialId The ID of the server connection authentication credential.
	 * @return string The URI of the server connection authentication credential.
	 */
	public function buildServerConnectionAuthenticationCredentialUri( string $serverConnectionAuthenticationCredentialId ): string;

	/**
	 * Builds the URI of the e-mails.
	 * @return string The URI of the e-mails.
	 */
	public function buildEMailsUri(): string;

	/**
	 * Builds the URI of a specific e-mail.
	 * @param string $eMailId The ID of the e-mail.
	 * @return string The URI of the e-mail.
	 */
	public function buildEMailUri( string $eMailId ): string;

	/**
	 * Builds the URI of the e-mail addresses.
	 * @return string The URI of the e-mail addresses.
	 */
	public function buildEMailAddressesUri(): string;

	/**
	 * Builds the URI of a specific e-mail address.
	 * @param string $eMailAddressId The ID of the e-mail address.
	 * @return string The URI of the e-mail address.
	 */
	public function buildEMailAddressUri( string $eMailAddressId ): string;

	/**
	 * Builds the URI of the e-mail attachments.
	 * @return string The URI of the e-mail attachments.
	 */
	public function buildEMailAttachmentsUri(): string;

	/**
	 * Builds the URI of a specific e-mail attachment.
	 * @param string $eMailAttachmentId The ID of the e-mail attachment.
	 * @return string The URI of the e-mail attachment.
	 */
	public function buildEMailAttachmentUri( string $eMailAttachmentId ): string;
}
