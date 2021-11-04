<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

use CodeKandis\AccuMailEntities\EMailEntityInterface;

/**
 * Represents the interface of any e-mail entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface PersistableEMailEntityInterface extends EMailEntityInterface, PersistableEntityInterface
{
}
