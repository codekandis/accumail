<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

use CodeKandis\AccuMailEntities\EMailAddressEntity;

/**
 * Represents an e-mail address entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class PersistableEMailAddressEntity extends EMailAddressEntity implements PersistableEMailAddressEntityInterface
{
	use PersistableEntityTrait;
}
