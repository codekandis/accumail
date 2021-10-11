<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities\Collections;

use CodeKandis\AccuMail\Environment\Entities\EMailEntityInterface;
use CodeKandis\AccuMail\Environment\Entities\EntityInterface;

/**
 * Represents a collection of e-mail entities.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class EMailEntityCollection extends AbstractEntityCollection implements EMailEntityCollectionInterface
{
	/**
	 * Constructor method.
	 * @param EMailEntityInterface[] $eMails The initial e-mails of the collection.
	 * @throws EntityExistsException An e-mail already exists in the collection.
	 */
	public function __construct( EMailEntityInterface ...$eMails )
	{
		parent::__construct( ...$eMails );
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
