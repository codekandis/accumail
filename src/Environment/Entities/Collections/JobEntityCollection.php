<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities\Collections;

use CodeKandis\AccuMail\Environment\Entities\EntityInterface;
use CodeKandis\AccuMail\Environment\Entities\JobEntityInterface;

/**
 * Represents a collection of job entities.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class JobEntityCollection extends AbstractEntityCollection implements JobEntityCollectionInterface
{
	/**
	 * Constructor method.
	 * @param JobEntityInterface[] $jobs The initial jobs of the collection.
	 * @throws EntityExistsException A job already exists in the collection.
	 */
	public function __construct( JobEntityInterface ...$jobs )
	{
		parent::__construct( ...$jobs );
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
