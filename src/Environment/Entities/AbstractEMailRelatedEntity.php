<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

/**
 * Represents the base class of any e-mail related entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class AbstractEMailRelatedEntity extends AbstractEntity implements EMailRelatedEntityInterface
{
	/**
	 * Stores the e-mail ID.
	 * @var string
	 */
	public string $eMailId = '';

	/**
	 * {@inheritDoc}
	 */
	public function getEMailId(): string
	{
		return $this->eMailId;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setEMailId( string $eMailId ): void
	{
		$this->eMailId = $eMailId;
	}
}
