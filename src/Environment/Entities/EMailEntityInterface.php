<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

use CodeKandis\AccuMail\Environment\Entities\Collections\EMailAddressEntityCollectionInterface;
use CodeKandis\AccuMail\Environment\Entities\Collections\EMailAttachmentEntityCollectionInterface;

/**
 * Represents the interface of any e-mail entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface EMailEntityInterface extends JobRelatedEntityInterface
{
	/**
	 * Gets the `From` address.
	 * @return ?EMailAddressEntityInterface The `From` address.
	 */
	public function getFromAddress(): ?EMailAddressEntityInterface;

	/**
	 * Sets the from address.
	 * @param ?EMailAddressEntityInterface $fromAddress The `From` address.
	 */
	public function setFromAddress( ?EMailAddressEntityInterface $fromAddress ): void;

	/**
	 * Gets the `To` addresses.
	 * @return EMailAddressEntityCollectionInterface The `To` addresses.
	 */
	public function getToAddresses(): EMailAddressEntityCollectionInterface;

	/**
	 * Sets the `To` addresses.
	 * @param EMailAddressEntityCollectionInterface $toAddresses The `To` addresses.
	 */
	public function setToAddresses( EMailAddressEntityCollectionInterface $toAddresses ): void;

	/**
	 * Gets the `CC` addresses.
	 * @return EMailAddressEntityCollectionInterface The `CC` addresses.
	 */
	public function getCcAddresses(): EMailAddressEntityCollectionInterface;

	/**
	 * Sets the `CC` addresses.
	 * @param EMailAddressEntityCollectionInterface $ccAddresses The `CC` addresses.
	 */
	public function setCcAddresses( EMailAddressEntityCollectionInterface $ccAddresses ): void;

	/**
	 * Gets the `BCC` addresses.
	 * @return EMailAddressEntityCollectionInterface The `BCC` addresses.
	 */
	public function getBccAddresses(): EMailAddressEntityCollectionInterface;

	/**
	 * Sets the `BCC` addresses.
	 * @param EMailAddressEntityCollectionInterface $bccAddresses The `BCC` addresses.
	 */
	public function setBccAddresses( EMailAddressEntityCollectionInterface $bccAddresses ): void;

	/**
	 * Gets the subject.
	 * @return string The subject.
	 */
	public function getSubject(): string;

	/**
	 * Sets the subject.
	 * @param string $subject The subject.
	 */
	public function setSubject( string $subject ): void;

	/**
	 * Gets the plain text body.
	 * @return string The plain text body.
	 */
	public function getPlainTextBody(): string;

	/**
	 * Sets the plain text body.
	 * @param string $plainTextBody The plain text body.
	 */
	public function setPlainTextBody( string $plainTextBody ): void;

	/**
	 * Gets the HTML body.
	 * @return string The HTML body.
	 */
	public function getHtmlBody(): string;

	/**
	 * Sets the HTML body.
	 * @param string $htmlBody The HTML body.
	 */
	public function setHtmlBody( string $htmlBody ): void;

	/**
	 * Gets the attachments.
	 * @return EMailAttachmentEntityCollectionInterface The attachments.
	 */
	public function getAttachments(): EMailAttachmentEntityCollectionInterface;

	/**
	 * Sets the attachments.
	 * @param EMailAttachmentEntityCollectionInterface $attachments The attachments.
	 */
	public function setAttachments( EMailAttachmentEntityCollectionInterface $attachments ): void;
}
