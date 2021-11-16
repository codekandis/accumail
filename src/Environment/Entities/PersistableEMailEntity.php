<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

use CodeKandis\AccuMailEntities\EMailEntity;

/**
 * Represents an e-mail entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class PersistableEMailEntity extends EMailEntity implements PersistableEMailEntityInterface
{
	use PersistableEntityTrait;
}
