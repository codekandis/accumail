<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

/**
 * Represents the interface of any e-mail related entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface EMailRelatedEntityInterface extends EntityInterface
{
	/**
	 * Gets the e-mail ID.
	 * @return string The e-mail ID.
	 */
	public function getEMailId(): string;

	/**
	 * Sets the e-mail ID.
	 * @param string $eMailId The e-mail ID.
	 */
	public function setEMailId( string $eMailId ): void;
}
