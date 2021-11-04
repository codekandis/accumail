<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Api\Entities\UriExtenders;

use CodeKandis\AccuMail\Api\Http\UriBuilders\ApiUriBuilderInterface;
use CodeKandis\AccuMailEntities\EMailEntityInterface;

/**
 * Represents an API URI extender of any e-mail.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class EMailApiUriExtender extends AbstractApiUriExtender
{
	/**
	 * Stores the e-mail to extend its URIs.
	 * @var EMailEntityInterface
	 */
	private EMailEntityInterface $eMail;

	/**
	 * Constructor method.
	 * @param ApiUriBuilderInterface $apiUriBuilder The API URI builder the API URI extender depends on.
	 * @param EMailEntityInterface $eMail The e-mail to extend its URIs.
	 */
	public function __construct( ApiUriBuilderInterface $apiUriBuilder, EMailEntityInterface $eMail )
	{
		parent::__construct( $apiUriBuilder );

		$this->eMail = $eMail;
	}

	/**
	 * {@inheritDoc}
	 */
	public function extend(): void
	{
		$this->addCanonicalUri();
		$this->addFromAddressUri();
		$this->addToAddressesUris();
		$this->addCcAddressesUris();
		$this->addBccAddressesUris();
		$this->addAttachmentsUris();
	}

	/**
	 * Adds the canonical URI of the e-mail .
	 */
	private function addCanonicalUri(): void
	{
		$this->eMail->setCanonicalUri(
			$this->apiUriBuilder->buildEMailUri(
				$this->eMail->getId()
			)
		);
	}

	/**
	 * Adds the canonical URI of the `FROM` address.
	 */
	private function addFromAddressUri(): void
	{
		( new EMailAddressApiUriExtender(
			$this->apiUriBuilder, $this->eMail->getFromAddress()
		) )
			->extend();
	}

	/**
	 * Adds the canonical URI of the `TO` addresses.
	 */
	private function addToAddressesUris(): void
	{
		foreach ( $this->eMail->getToAddresses() as $toAddress )
		{
			( new EMailAddressApiUriExtender(
				$this->apiUriBuilder, $toAddress
			) )
				->extend();
		}
	}

	/**
	 * Adds the canonical URI of the `CC` addresses.
	 */
	private function addCcAddressesUris(): void
	{
		foreach ( $this->eMail->getCcAddresses() as $ccAddress )
		{
			( new EMailAddressApiUriExtender(
				$this->apiUriBuilder, $ccAddress
			) )
				->extend();
		}
	}

	/**
	 * Adds the canonical URI of the `BCC` addresses.
	 */
	private function addBccAddressesUris(): void
	{
		foreach ( $this->eMail->getBccAddresses() as $bccAddress )
		{
			( new EMailAddressApiUriExtender(
				$this->apiUriBuilder, $bccAddress
			) )
				->extend();
		}
	}

	/**
	 * Adds the canonical URI of the attachments.
	 */
	private function addAttachmentsUris(): void
	{
		foreach ( $this->eMail->getAttachments() as $attachment )
		{
			( new EMailAttachmentApiUriExtender(
				$this->apiUriBuilder, $attachment
			) )
				->extend();
		}
	}
}
