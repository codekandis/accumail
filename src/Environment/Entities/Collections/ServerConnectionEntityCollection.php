<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities\Collections;

use CodeKandis\AccuMail\Environment\Entities\EntityInterface;
use CodeKandis\AccuMail\Environment\Entities\ServerConnectionEntityInterface;

/**
 * Represents a collection of server connection entities.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class ServerConnectionEntityCollection extends AbstractEntityCollection implements ServerConnectionEntityCollectionInterface
{
	/**
	 * Constructor method.
	 * @param ServerConnectionEntityInterface[] $serverConnections The initial server connections of the collection.
	 * @throws EntityExistsException A server connection already exists in the collection.
	 */
	public function __construct( ServerConnectionEntityInterface ...$serverConnections )
	{
		parent::__construct( ...$serverConnections );
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
