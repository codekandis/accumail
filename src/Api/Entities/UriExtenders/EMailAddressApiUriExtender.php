<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Api\Entities\UriExtenders;

use CodeKandis\AccuMail\Api\Http\UriBuilders\ApiUriBuilderInterface;
use CodeKandis\AccuMail\Environment\Entities\EMailAddressEntityInterface;

/**
 * Represents an API URI extender of any e-mail address.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class EMailAddressApiUriExtender extends AbstractApiUriExtender
{
	/**
	 * Stores the e-mail address to extend its URIs.
	 * @var EMailAddressEntityInterface
	 */
	private EMailAddressEntityInterface $eMailAddress;

	/**
	 * Constructor method.
	 * @param ApiUriBuilderInterface $apiUriBuilder The API URI builder the API URI extender depends on.
	 * @param EMailAddressEntityInterface $eMailAddress The e-mail address to extend its URIs.
	 */
	public function __construct( ApiUriBuilderInterface $apiUriBuilder, EMailAddressEntityInterface $eMailAddress )
	{
		parent::__construct( $apiUriBuilder );

		$this->eMailAddress = $eMailAddress;
	}

	/**
	 * {@inheritDoc}
	 */
	public function extend(): void
	{
		$this->addCanonicalUri();
	}

	/**
	 * Adds the canonical URI of the e-mail address .
	 */
	private function addCanonicalUri(): void
	{
		$this->eMailAddress->setCanonicalUri(
			$this->apiUriBuilder->buildEMailAddressUri(
				$this->eMailAddress->getId()
			)
		);
	}
}
