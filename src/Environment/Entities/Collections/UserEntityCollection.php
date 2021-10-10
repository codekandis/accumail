<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities\Collections;

use CodeKandis\AccuMail\Environment\Entities\EntityInterface;
use CodeKandis\AccuMail\Environment\Entities\UserEntityInterface;

/**
 * Represents a collection of user entities.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class UserEntityCollection extends AbstractEntityCollection implements UserEntityCollectionInterface
{
	/**
	 * Constructor method.
	 * @param UserEntityInterface[] $users The initial users of the collection.
	 * @throws EntityExistsException A user already exists in the collection.
	 */
	public function __construct( UserEntityInterface ...$users )
	{
		parent::__construct( ...$users );
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
