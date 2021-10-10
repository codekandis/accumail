<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories;

use CodeKandis\AccuMail\Environment\Entities\Collections\EMailAttachmentEntityCollectionInterface;
use CodeKandis\AccuMail\Environment\Entities\EMailAttachmentEntityInterface;
use CodeKandis\AccuMail\Environment\Entities\EMailEntityInterface;

/**
 * Represents the interface of any repository of any e-mail attachment entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface EMailAttachmentEntityRepositoryInterface
{
	/**
	 * Reads all e-mail attachments.
	 * @return EMailAttachmentEntityCollectionInterface The e-mail attachments.
	 */
	public function readEMailAttachments(): EMailAttachmentEntityCollectionInterface;

	/**
	 * Reads all e-mail attachments.
	 * @param EMailEntityInterface $eMail The e-mail with the ID to find.
	 * @return EMailAttachmentEntityCollectionInterface The e-mail attachments.
	 */
	public function readEMailAttachmentsByEMailId( EMailEntityInterface $eMail ): EMailAttachmentEntityCollectionInterface;

	/**
	 * Reads all e-mail attachments without content.
	 * @param EMailEntityInterface $eMail The e-mail with the ID to find.
	 * @return EMailAttachmentEntityCollectionInterface The e-mail attachments.
	 */
	public function readEMailAttachmentsByEMailIdWithoutContent( EMailEntityInterface $eMail ): EMailAttachmentEntityCollectionInterface;

	/**
	 * Reads an e-mail attachment by its record ID.
	 * @param EMailAttachmentEntityInterface $eMailAttachment The e-mail attachment with the record ID to find.
	 * @return ?EMailAttachmentEntityInterface The e-mail attachment if found, otherwise null.
	 */
	public function readEMailAttachmentByRecordId( EMailAttachmentEntityInterface $eMailAttachment ): ?EMailAttachmentEntityInterface;

	/**
	 * Reads an e-mail attachment by its ID.
	 * @param EMailAttachmentEntityInterface $eMailAttachment The e-mail attachment with the ID to find.
	 * @return ?EMailAttachmentEntityInterface The e-mail attachment if found, otherwise null.
	 */
	public function readEMailAttachmentById( EMailAttachmentEntityInterface $eMailAttachment ): ?EMailAttachmentEntityInterface;

	/**
	 * Reads an e-mail attachment by a e-mail ID.
	 * @param EMailEntityInterface $eMail The e-mail with the ID to find.
	 * @return ?EMailAttachmentEntityInterface The e-mail attachment if found, otherwise null.
	 */
	public function readEMailAttachmentByEMailId( EMailEntityInterface $eMail ): ?EMailAttachmentEntityInterface;

	/**
	 * Creates an e-mail attachment by its e-mail ID.
	 * @param EMailAttachmentEntityInterface $eMailAttachment The e-mail attachment to create.
	 * @param EMailEntityInterface $eMail The e-mail with the e-mail ID.
	 * @return EMailAttachmentEntityInterface The e-mail attachment with the record ID of the created e-mail attachment.
	 */
	public function createEMailAttachmentByEMailId( EMailAttachmentEntityInterface $eMailAttachment, EMailEntityInterface $eMail ): EMailAttachmentEntityInterface;
}
