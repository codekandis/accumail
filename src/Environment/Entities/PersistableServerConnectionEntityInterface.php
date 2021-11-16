<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

use CodeKandis\AccuMailEntities\ServerConnectionEntityInterface;

/**
 * Represents the interface of any server connection entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface PersistableServerConnectionEntityInterface extends ServerConnectionEntityInterface, PersistableEntityInterface
{
}
