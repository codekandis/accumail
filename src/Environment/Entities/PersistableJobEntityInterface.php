<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

use CodeKandis\AccuMailEntities\JobEntityInterface;

/**
 * Represents the interface of any job entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface PersistableJobEntityInterface extends JobEntityInterface, PersistableEntityInterface
{
}
