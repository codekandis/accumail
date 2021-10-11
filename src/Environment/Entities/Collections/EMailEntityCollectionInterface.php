<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities\Collections;

use CodeKandis\AccuMail\Environment\Entities\EMailEntityInterface;
use CodeKandis\AccuMail\Environment\Entities\EntityInterface;

/**
 * Represents the interface of any collection of e-mail entities.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface EMailEntityCollectionInterface extends EntityCollectionInterface
{
	/**
	 * Gets the current e-mail.
	 * @return EMailEntityInterface The current e-mail.
	 */
	public function current(): EntityInterface;

	/**
	 * Gets the e-mail at the specified index.
	 * @param int $index The index of the e-mail.
	 * @return EMailEntityInterface The e-mail to get.
	 */
	public function offsetGet( $index ): EntityInterface;
}
