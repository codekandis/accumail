<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

use CodeKandis\AccuMailEntities\EMailAddressEntityInterface;

/**
 * Represents the interface of any e-mail address entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface PersistableEMailAddressEntityInterface extends EMailAddressEntityInterface, PersistableEntityInterface
{
}
