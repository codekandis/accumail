<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities\Collections;

use CodeKandis\AccuMail\Environment\Entities\ApiKeyEntityInterface;
use CodeKandis\AccuMail\Environment\Entities\EntityInterface;

/**
 * Represents the interface of any collection of API key entities.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ApiKeyEntityCollectionInterface extends EntityCollectionInterface
{
	/**
	 * Gets the current API key.
	 * @return ApiKeyEntityInterface The current API key.
	 */
	public function current(): EntityInterface;

	/**
	 * Gets the API key at the specified index.
	 * @param int $index The index of the API key.
	 * @return ApiKeyEntityInterface The API key to get.
	 */
	public function offsetGet( $index ): EntityInterface;
}
