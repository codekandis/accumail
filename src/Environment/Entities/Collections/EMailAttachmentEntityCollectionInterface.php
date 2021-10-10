<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities\Collections;

use CodeKandis\AccuMail\Environment\Entities\EMailAttachmentEntityInterface;
use CodeKandis\AccuMail\Environment\Entities\EntityInterface;

/**
 * Represents the interface of any collection of e-mail attachment entities.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface EMailAttachmentEntityCollectionInterface extends EntityCollectionInterface
{
	/**
	 * Gets the current e-mail attachment.
	 * @return EMailAttachmentEntityInterface The current e-mail attachment.
	 */
	public function current(): EntityInterface;

	/**
	 * Gets the e-mail attachment at the specified index.
	 * @param int $index The index of the e-mail attachment.
	 * @return EMailAttachmentEntityInterface The e-mail attachment to get.
	 */
	public function offsetGet( $index ): EntityInterface;
}
