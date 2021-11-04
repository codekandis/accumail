<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Api\Entities\UriExtenders;

use CodeKandis\AccuMail\Api\Http\UriBuilders\ApiUriBuilderInterface;
use CodeKandis\AccuMailEntities\ServerConnectionAuthenticationCredentialEntityInterface;

/**
 * Represents an API URI extender of any server connection authentication credential.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class ServerConnectionAuthenticationCredentialApiUriExtender extends AbstractApiUriExtender
{
	/**
	 * Stores the server connection authentication credential to extend its URIs.
	 * @var ServerConnectionAuthenticationCredentialEntityInterface
	 */
	private ServerConnectionAuthenticationCredentialEntityInterface $serverConnectionAuthenticationCredential;

	/**
	 * Constructor method.
	 * @param ApiUriBuilderInterface $apiUriBuilder The API URI builder the API URI extender depends on.
	 * @param ServerConnectionAuthenticationCredentialEntityInterface $serverConnectionAuthenticationCredential The server connection authentication credential to extend its URIs.
	 */
	public function __construct( ApiUriBuilderInterface $apiUriBuilder, ServerConnectionAuthenticationCredentialEntityInterface $serverConnectionAuthenticationCredential )
	{
		parent::__construct( $apiUriBuilder );

		$this->serverConnectionAuthenticationCredential = $serverConnectionAuthenticationCredential;
	}

	/**
	 * {@inheritDoc}
	 */
	public function extend(): void
	{
		$this->addCanonicalUri();
	}

	/**
	 * Adds the canonical URI of the server connection authentication credential.
	 */
	private function addCanonicalUri(): void
	{
		$this->serverConnectionAuthenticationCredential->setCanonicalUri(
			$this->apiUriBuilder->buildServerConnectionAuthenticationCredentialUri(
				$this->serverConnectionAuthenticationCredential->getId()
			)
		);
	}
}
