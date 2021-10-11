<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

use CodeKandis\AccuMail\Environment\Entities\Collections\EMailAddressEntityCollection;
use CodeKandis\AccuMail\Environment\Entities\Collections\EMailAddressEntityCollectionInterface;
use CodeKandis\AccuMail\Environment\Entities\Collections\EMailAttachmentEntityCollection;
use CodeKandis\AccuMail\Environment\Entities\Collections\EMailAttachmentEntityCollectionInterface;

/**
 * Represents an e-mail entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class EMailEntity extends AbstractJobRelatedEntity implements EMailEntityInterface
{
	/**
	 * Stores the `From` address.
	 * @var ?EMailAddressEntityInterface
	 */
	public ?EMailAddressEntityInterface $fromAddress = null;

	/**
	 * Stores the `To` addresses.
	 * @var EMailAddressEntityCollectionInterface
	 */
	public EMailAddressEntityCollectionInterface $toAddresses;

	/**
	 * Stores the `CC` addresses.
	 * @var EMailAddressEntityCollectionInterface
	 */
	public EMailAddressEntityCollectionInterface $ccAddresses;

	/**
	 * Stores the `BCC` addresses.
	 * @var EMailAddressEntityCollectionInterface
	 */
	public EMailAddressEntityCollectionInterface $bccAddresses;

	/**
	 * Stores the subject.
	 * @var string
	 */
	public string $subject = '';

	/**
	 * Stores the plain text body.
	 * @var string
	 */
	public string $plainTextBody = '';

	/**
	 * Stores the HTML body.
	 * @var string
	 */
	public string $htmlBody = '';

	/**
	 * Stores the attachments.
	 * @var EMailAttachmentEntityCollectionInterface
	 */
	public EMailAttachmentEntityCollectionInterface $attachments;

	/**
	 * Constructor method.
	 */
	public function __construct()
	{
		$this->toAddresses  = new EMailAddressEntityCollection();
		$this->ccAddresses  = new EMailAddressEntityCollection();
		$this->bccAddresses = new EMailAddressEntityCollection();
		$this->attachments  = new EMailAttachmentEntityCollection();
	}

	/**
	 * {@inheritDoc}
	 */
	public function getFromAddress(): ?EMailAddressEntityInterface
	{
		return $this->fromAddress;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setFromAddress( ?EMailAddressEntityInterface $fromAddress ): void
	{
		$this->fromAddress = $fromAddress;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getToAddresses(): EMailAddressEntityCollectionInterface
	{
		return $this->toAddresses;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setToAddresses( EMailAddressEntityCollectionInterface $toAddresses ): void
	{
		$this->toAddresses = $toAddresses;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getCcAddresses(): EMailAddressEntityCollectionInterface
	{
		return $this->ccAddresses;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setCcAddresses( EMailAddressEntityCollectionInterface $ccAddresses ): void
	{
		$this->ccAddresses = $ccAddresses;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getBccAddresses(): EMailAddressEntityCollectionInterface
	{
		return $this->bccAddresses;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setBccAddresses( EMailAddressEntityCollectionInterface $bccAddresses ): void
	{
		$this->bccAddresses = $bccAddresses;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getSubject(): string
	{
		return $this->subject;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setSubject( string $subject ): void
	{
		$this->subject = $subject;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getPlainTextBody(): string
	{
		return $this->plainTextBody;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setPlainTextBody( string $plainTextBody ): void
	{
		$this->plainTextBody = $plainTextBody;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getHtmlBody(): string
	{
		return $this->htmlBody;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setHtmlBody( string $htmlBody ): void
	{
		$this->htmlBody = $htmlBody;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getAttachments(): EMailAttachmentEntityCollectionInterface
	{
		return $this->attachments;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setAttachments( EMailAttachmentEntityCollectionInterface $attachments ): void
	{
		$this->attachments = $attachments;
	}
}
