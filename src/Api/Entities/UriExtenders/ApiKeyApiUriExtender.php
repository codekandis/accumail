<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Api\Entities\UriExtenders;

use CodeKandis\AccuMail\Api\Http\UriBuilders\ApiUriBuilderInterface;
use CodeKandis\AccuMailEntities\ApiKeyEntityInterface;

/**
 * Represents an API URI extender of any API key.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class ApiKeyApiUriExtender extends AbstractApiUriExtender
{
	/**
	 * Stores the API key to extend its URIs.
	 * @var ApiKeyEntityInterface
	 */
	private ApiKeyEntityInterface $apiKey;

	/**
	 * Constructor method.
	 * @param ApiUriBuilderInterface $apiUriBuilder The API URI builder the API URI extender depends on.
	 * @param ApiKeyEntityInterface $apiKey The API key to extend its URIs.
	 */
	public function __construct( ApiUriBuilderInterface $apiUriBuilder, ApiKeyEntityInterface $apiKey )
	{
		parent::__construct( $apiUriBuilder );

		$this->apiKey = $apiKey;
	}

	/**
	 * {@inheritDoc}
	 */
	public function extend(): void
	{
		$this->addCanonicalUri();
	}

	/**
	 * Adds the canonical URI of the API key .
	 */
	private function addCanonicalUri(): void
	{
		$this->apiKey->setCanonicalUri(
			$this->apiUriBuilder->buildApiKeyUri(
				$this->apiKey->getId()
			)
		);
	}
}
