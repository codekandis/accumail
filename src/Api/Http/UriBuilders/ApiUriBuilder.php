<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Api\Http\UriBuilders;

use CodeKandis\Tiphy\Http\UriBuilders\AbstractUriBuilder;

/**
 * Represents an API URI builder.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class ApiUriBuilder extends AbstractUriBuilder implements ApiUriBuilderInterface
{
	/**
	 * {@inheritDoc}
	 */
	public function buildIndexUri(): string
	{
		return $this->build( 'index' );
	}

	/**
	 * {@inheritDoc}
	 */
	public function buildUsersUri(): string
	{
		return $this->build( 'users' );
	}

	/**
	 * {@inheritDoc}
	 */
	public function buildUserUri( string $userId ): string
	{
		return $this->build( 'user', $userId );
	}

	/**
	 * {@inheritDoc}
	 */
	public function buildApiKeysUri(): string
	{
		return $this->build( 'apiKeys' );
	}

	/**
	 * {@inheritDoc}
	 */
	public function buildApiKeyUri( string $apiKeyId ): string
	{
		return $this->build( 'apiKey', $apiKeyId );
	}

	/**
	 * {@inheritDoc}
	 */
	public function buildJobsUri(): string
	{
		return $this->build( 'jobs' );
	}

	/**
	 * {@inheritDoc}
	 */
	public function buildJobUri( string $jobId ): string
	{
		return $this->build( 'job', $jobId );
	}

	/**
	 * {@inheritDoc}
	 */
	public function buildJobsCreatedUri(): string
	{
		return $this->build( 'jobsCreated' );
	}

	/**
	 * {@inheritDoc}
	 */
	public function buildJobsSentSucceededUri(): string
	{
		return $this->build( 'jobsSentSucceeded' );
	}

	/**
	 * {@inheritDoc}
	 */
	public function buildJobsSentFailedUri(): string
	{
		return $this->build( 'jobsSentFailed' );
	}

	/**
	 * {@inheritDoc}
	 */
	public function buildServerConnectionsUri(): string
	{
		return $this->build( 'serverConnections' );
	}

	/**
	 * {@inheritDoc}
	 */
	public function buildServerConnectionUri( string $serverConnectionId ): string
	{
		return $this->build( 'serverConnection', $serverConnectionId );
	}

	/**
	 * {@inheritDoc}
	 */
	public function buildServerConnectionAuthenticationCredentialsUri(): string
	{
		return $this->build( 'serverConnectionAuthenticationCredentials' );
	}

	/**
	 * {@inheritDoc}
	 */
	public function buildServerConnectionAuthenticationCredentialUri( string $serverConnectionAuthenticationCredentialId ): string
	{
		return $this->build( 'serverConnectionAuthenticationCredential', $serverConnectionAuthenticationCredentialId );
	}

	/**
	 * {@inheritDoc}
	 */
	public function buildEMailsUri(): string
	{
		return $this->build( 'eMails' );
	}

	/**
	 * {@inheritDoc}
	 */
	public function buildEMailUri( string $eMailId ): string
	{
		return $this->build( 'eMail', $eMailId );
	}

	/**
	 * {@inheritDoc}
	 */
	public function buildEMailAddressesUri(): string
	{
		return $this->build( 'eMailAddresses' );
	}

	/**
	 * {@inheritDoc}
	 */
	public function buildEMailAddressUri( string $eMailAddressId ): string
	{
		return $this->build( 'eMailAddress', $eMailAddressId );
	}

	/**
	 * {@inheritDoc}
	 */
	public function buildEMailAttachmentsUri(): string
	{
		return $this->build( 'eMailAttachments' );
	}

	/**
	 * {@inheritDoc}
	 */
	public function buildEMailAttachmentUri( string $eMailAttachmentId ): string
	{
		return $this->build( 'eMailAttachment', $eMailAttachmentId );
	}
}
