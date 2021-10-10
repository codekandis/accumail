<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities\Collections;

use CodeKandis\AccuMail\Environment\Entities\EntityInterface;
use CodeKandis\AccuMail\Environment\Entities\ServerConnectionAuthenticationCredentialEntityInterface;

/**
 * Represents a collection of server connection authentication credential entities.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class ServerConnectionAuthenticationCredentialEntityCollection extends AbstractEntityCollection implements ServerConnectionAuthenticationCredentialEntityCollectionInterface
{
	/**
	 * Constructor method.
	 * @param ServerConnectionAuthenticationCredentialEntityInterface[] $serverConnectionAuthenticationCredentials The initial server connection authentication credentials of the collection.
	 * @throws EntityExistsException A server connection authentication credential already exists in the collection.
	 */
	public function __construct( ServerConnectionAuthenticationCredentialEntityInterface ...$serverConnectionAuthenticationCredentials )
	{
		parent::__construct( ...$serverConnectionAuthenticationCredentials );
	}

	/**
	 * {@inheritDoc}
	 */
	public function current(): EntityInterface
	{
		return parent::current();
	}

	/**
	 * {@inheritDoc}
	 */
	public function offsetGet( $index ): EntityInterface
	{
		return parent::offsetGet( $index );
	}
}
