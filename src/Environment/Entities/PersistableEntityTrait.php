<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

/**
 * Represents a trait to provide persistence data.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
trait PersistableEntityTrait
{
	/**
	 * Stores the record ID.
	 * @var string
	 */
	public string $_id = '';

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
	public function jsonSerialize(): array
	{
		$serializedJson = parent::jsonSerialize();
		unset( $serializedJson[ '_id' ] );

		return $serializedJson;
	}
}
