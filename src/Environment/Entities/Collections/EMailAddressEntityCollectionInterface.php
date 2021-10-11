<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities\Collections;

use CodeKandis\AccuMail\Environment\Entities\EMailAddressEntityInterface;
use CodeKandis\AccuMail\Environment\Entities\EntityInterface;

/**
 * Represents the interface of any collection of e-mail address entities.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface EMailAddressEntityCollectionInterface extends EntityCollectionInterface
{
	/**
	 * Gets the current e-mail address.
	 * @return EMailAddressEntityInterface The current e-mail address.
	 */
	public function current(): EntityInterface;

	/**
	 * Gets the e-mail address at the specified index.
	 * @param int $index The index of the e-mail address.
	 * @return EMailAddressEntityInterface The e-mail address to get.
	 */
	public function offsetGet( $index ): EntityInterface;
}
