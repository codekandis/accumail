<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

use CodeKandis\AccuMailEntities\UserEntityInterface;

/**
 * Represents the interface of any user entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface PersistableUserEntityInterface extends UserEntityInterface, PersistableEntityInterface
{
}
