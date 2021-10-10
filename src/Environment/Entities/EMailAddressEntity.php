<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

/**
 * Represents an e-mail address entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class EMailAddressEntity extends AbstractEMailRelatedEntity implements EMailAddressEntityInterface
{
	/**
	 * Stores the type.
	 * @var string
	 */
	public string $type = '';

	/**
	 * Stores the name.
	 * @var string
	 */
	public string $name = '';

	/**
	 * Stores the address.
	 * @var string
	 */
	public string $address = '';

	/**
	 * {@inheritDoc}
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setType( string $type ): void
	{
		$this->type = $type;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setName( string $name ): void
	{
		$this->name = $name;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getAddress(): string
	{
		return $this->address;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setAddress( string $address ): void
	{
		$this->address = $address;
	}
}
