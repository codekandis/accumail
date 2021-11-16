<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

use CodeKandis\AccuMailEntities\EMailAttachmentEntity;

/**
 * Represents an e-mail attachment entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class PersistableEMailAttachmentEntity extends EMailAttachmentEntity implements PersistableEMailAttachmentEntityInterface
{
	use PersistableEntityTrait;
}
