<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities\Collections;

use CodeKandis\AccuMail\Environment\Entities\ApiKeyEntityInterface;
use CodeKandis\AccuMail\Environment\Entities\EntityInterface;

/**
 * Represents a collection of API key entities.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class ApiKeyEntityCollection extends AbstractEntityCollection implements ApiKeyEntityCollectionInterface
{
	/**
	 * Constructor method.
	 * @param ApiKeyEntityInterface[] $apiKeys The initial API keys of the collection.
	 * @throws EntityExistsException A API key already exists in the collection.
	 */
	public function __construct( ApiKeyEntityInterface ...$apiKeys )
	{
		parent::__construct( ...$apiKeys );
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
