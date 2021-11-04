<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Api\Entities\UriExtenders;

use CodeKandis\AccuMail\Api\Http\UriBuilders\ApiUriBuilderInterface;
use CodeKandis\AccuMailEntities\ServerConnectionEntityInterface;

/**
 * Represents an API URI extender of any server connection.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class ServerConnectionApiUriExtender extends AbstractApiUriExtender
{
	/**
	 * Stores the server connection to extend its URIs.
	 * @var ServerConnectionEntityInterface
	 */
	private ServerConnectionEntityInterface $serverConnection;

	/**
	 * Constructor method.
	 * @param ApiUriBuilderInterface $apiUriBuilder The API URI builder the API URI extender depends on.
	 * @param ServerConnectionEntityInterface $serverConnection The server connection to extend its URIs.
	 */
	public function __construct( ApiUriBuilderInterface $apiUriBuilder, ServerConnectionEntityInterface $serverConnection )
	{
		parent::__construct( $apiUriBuilder );

		$this->serverConnection = $serverConnection;
	}

	/**
	 * {@inheritDoc}
	 */
	public function extend(): void
	{
		$this->addCanonicalUri();
		$this->addAuthenticationCredentialUri();
	}

	/**
	 * Adds the canonical URI of the server connection .
	 */
	private function addCanonicalUri(): void
	{
		$this->serverConnection->setCanonicalUri(
			$this->apiUriBuilder->buildServerConnectionUri(
				$this->serverConnection->getId()
			)
		);
	}

	/**
	 * Adds the canonical URI of the server connection's authentication credential.
	 */
	private function addAuthenticationCredentialUri(): void
	{
		( new ServerConnectionAuthenticationCredentialApiUriExtender(
			$this->apiUriBuilder, $this->serverConnection->getAuthenticationCredential()
		) )
			->extend();
	}
}
