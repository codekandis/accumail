<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

use CodeKandis\AccuMailEntities\EMailAttachmentEntityInterface;

/**
 * Represents the interface of any e-mail attachment entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface PersistableEMailAttachmentEntityInterface extends EMailAttachmentEntityInterface, PersistableEntityInterface
{
}
