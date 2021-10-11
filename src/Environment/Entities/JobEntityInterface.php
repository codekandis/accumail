<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

use DateTimeInterface;

/**
 * Repreprocesseds the interface of any job entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface JobEntityInterface extends EntityInterface
{
	/**
	 * Gets the user.
	 * @return ?UserEntityInterface The user.
	 */
	public function getUser(): ?UserEntityInterface;

	/**
	 * Sets the user.
	 * @param ?UserEntityInterface $user The user.
	 */
	public function setUser( ?UserEntityInterface $user ): void;

	/**
	 * Gets the status.
	 * @return string The status.
	 */
	public function getStatus(): string;

	/**
	 * Sets the status.
	 * @param string $status The status.
	 */
	public function setStatus( string $status ): void;

	/**
	 * Gets the timestamp when the job has been created.
	 * @return DateTimeInterface The timestamp when the job has been created.
	 */
	public function getTimestampCreated(): DateTimeInterface;

	/**
	 * Sets the timestamp when the job has been created.
	 * @param DateTimeInterface $timestampCreated The timestamp when the job has been created.
	 */
	public function setTimestampCreated( DateTimeInterface $timestampCreated ): void;

	/**
	 * Gets the timestamp when the job has been processed.
	 * @return ?DateTimeInterface The timestamp when the job has been processed.
	 */
	public function getTimestampProcessed(): ?DateTimeInterface;

	/**
	 * Sets the timestamp when the job has been processed.
	 * @param ?DateTimeInterface $timestampProcessed The timestamp when the job has been processed.
	 */
	public function setTimestampProcessed( ?DateTimeInterface $timestampProcessed ): void;

	/**
	 * Gets the server connection.
	 * @return ?ServerConnectionEntityInterface The server connection.
	 */
	public function getServerConnection(): ?ServerConnectionEntityInterface;

	/**
	 * Sets the server connection.
	 * @param ?ServerConnectionEntityInterface $serverConnection The server connection.
	 */
	public function setServerConnection( ?ServerConnectionEntityInterface $serverConnection ): void;

	/**
	 * Gets the e-mail.
	 * @return ?EMailEntityInterface The e-mail.
	 */
	public function getEMail(): ?EMailEntityInterface;

	/**
	 * Sets the e-mail.
	 * @param ?EMailEntityInterface $eMail The e-mail.
	 */
	public function setEMail( ?EMailEntityInterface $eMail ): void;
}
