<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

use DateTimeImmutable;
use DateTimeInterface;

/**
 * Repreprocesseds a job entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class JobEntity extends AbstractEntity implements JobEntityInterface
{
	/**
	 * Stores the user.
	 * @var ?UserEntityInterface
	 */
	public ?UserEntityInterface $user = null;

	/**
	 * Stores the status.
	 * @var string
	 */
	public string $status = '';

	/**
	 * Stores the timestamp when the job has been created.
	 * @var DateTimeInterface
	 */
	public DateTimeInterface $timestampCreated;

	/**
	 * Stores the timestamp when the job has been processed.
	 * @var ?DateTimeInterface
	 */
	public ?DateTimeInterface $timestampProcessed = null;

	/**
	 * Stores the server connection.
	 * @var ?ServerConnectionEntityInterface
	 */
	public ?ServerConnectionEntityInterface $serverConnection = null;

	/**
	 * Stores the e-mail.
	 * @var ?EMailEntityInterface
	 */
	public ?EMailEntityInterface $eMail = null;

	/**
	 * Constructor method.
	 */
	public function __construct()
	{
		$this->timestampCreated = new DateTimeImmutable();
	}

	/**
	 * {@inheritDoc}
	 */
	public function getUser(): ?UserEntityInterface
	{
		return $this->user;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setUser( ?UserEntityInterface $user ): void
	{
		$this->user = $user;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getStatus(): string
	{
		return $this->status;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setStatus( string $status ): void
	{
		$this->status = $status;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getTimestampCreated(): DateTimeInterface
	{
		return $this->timestampCreated;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setTimestampCreated( DateTimeInterface $timestampCreated ): void
	{
		$this->timestampCreated = $timestampCreated;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getTimestampProcessed(): ?DateTimeInterface
	{
		return $this->timestampProcessed;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setTimestampProcessed( ?DateTimeInterface $timestampProcessed ): void
	{
		$this->timestampProcessed = $timestampProcessed;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getServerConnection(): ?ServerConnectionEntityInterface
	{
		return $this->serverConnection;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setServerConnection( ?ServerConnectionEntityInterface $serverConnection ): void
	{
		$this->serverConnection = $serverConnection;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getEMail(): ?EMailEntityInterface
	{
		return $this->eMail;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setEMail( ?EMailEntityInterface $eMail ): void
	{
		$this->eMail = $eMail;
	}
}
