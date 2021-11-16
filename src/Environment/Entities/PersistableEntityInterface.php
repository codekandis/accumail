<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

use CodeKandis\AccuMailEntities\EntityInterface;

/**
 * Represents the interface of any persistable entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface PersistableEntityInterface extends EntityInterface
{
	/**
	 * Gets the record ID.
	 * @return string The record ID.
	 */
	public function get_Id(): string;

	/**
	 * Sets the record ID.
	 * @param string $_id The record ID.
	 */
	public function set_Id( string $_id ): void;
}
