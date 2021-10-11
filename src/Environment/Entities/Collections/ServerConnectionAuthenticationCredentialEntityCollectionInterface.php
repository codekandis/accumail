<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities\Collections;

use CodeKandis\AccuMail\Environment\Entities\EntityInterface;
use CodeKandis\AccuMail\Environment\Entities\ServerConnectionAuthenticationCredentialEntityInterface;

/**
 * Represents the interface of any collection of server connection authentication credential entities.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ServerConnectionAuthenticationCredentialEntityCollectionInterface extends EntityCollectionInterface
{
	/**
	 * Gets the current server connection authentication credential.
	 * @return ServerConnectionAuthenticationCredentialEntityInterface The current server connection authentication credential.
	 */
	public function current(): EntityInterface;

	/**
	 * Gets the server connection authentication credential at the specified index.
	 * @param int $index The index of the server connection authentication credential.
	 * @return ServerConnectionAuthenticationCredentialEntityInterface The server connection authentication credential to get.
	 */
	public function offsetGet( $index ): EntityInterface;
}
