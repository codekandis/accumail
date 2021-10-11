<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

use CodeKandis\Tiphy\Entities\AbstractEntity as OriginAbstractEntity;

/**
 * Represents the base class of any persistable entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class AbstractEntity extends OriginAbstractEntity implements EntityInterface
{
	/**
	 * Stores the record ID.
	 * @var string
	 */
	public string $_id = '';

	/**
	 * Stores the canonical URI.
	 * @var string
	 */
	public string $canonicalUri = '';

	/**
	 * Stores the ID of the entity.
	 * @var string
	 */
	public string $id = '';

	/**
	 * {@inheritDoc}
	 */
	public function get_Id(): string
	{
		return $this->_id;
	}

	/**
	 * {@inheritDoc}
	 */
	public function set_Id( string $_id ): void
	{
		$this->_id = $_id;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getCanonicalUri(): string
	{
		return $this->canonicalUri;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setCanonicalUri( string $canonicalUri ): void
	{
		$this->canonicalUri = $canonicalUri;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getId(): string
	{
		return $this->id;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setId( string $id ): void
	{
		$this->id = $id;
	}

	/**
	 * {@inheritDoc}
	 */
	public function jsonSerialize(): array
	{
		$serializedJson = parent::jsonSerialize();
		unset( $serializedJson[ '_id' ] );

		return $serializedJson;
	}
}
