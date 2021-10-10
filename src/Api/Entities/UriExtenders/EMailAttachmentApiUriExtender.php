<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Api\Entities\UriExtenders;

use CodeKandis\AccuMail\Api\Http\UriBuilders\ApiUriBuilderInterface;
use CodeKandis\AccuMail\Environment\Entities\EMailAttachmentEntityInterface;

/**
 * Represents an API URI extender of any e-mail attachment.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class EMailAttachmentApiUriExtender extends AbstractApiUriExtender
{
	/**
	 * Stores the e-mail attachment to extend its URIs.
	 * @var EMailAttachmentEntityInterface
	 */
	private EMailAttachmentEntityInterface $eMailAttachment;

	/**
	 * Constructor method.
	 * @param ApiUriBuilderInterface $apiUriBuilder The API URI builder the API URI extender depends on.
	 * @param EMailAttachmentEntityInterface $eMailAttachment The e-mail attachment to extend its URIs.
	 */
	public function __construct( ApiUriBuilderInterface $apiUriBuilder, EMailAttachmentEntityInterface $eMailAttachment )
	{
		parent::__construct( $apiUriBuilder );

		$this->eMailAttachment = $eMailAttachment;
	}

	/**
	 * {@inheritDoc}
	 */
	public function extend(): void
	{
		$this->addCanonicalUri();
	}

	/**
	 * Adds the canonical URI of the e-mail attachment .
	 */
	private function addCanonicalUri(): void
	{
		$this->eMailAttachment->setCanonicalUri(
			$this->apiUriBuilder->buildEMailAttachmentUri(
				$this->eMailAttachment->getId()
			)
		);
	}
}
