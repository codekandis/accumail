<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

use DateTimeImmutable;
use DateTimeInterface;

/**
 * Represents a job entity.
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
	 * Stores the timestamp when the job has been sent.
	 * @var ?DateTimeInterface
	 */
	public ?DateTimeInterface $timestampSent = null;

	/**
	 * Stores the timestamp when the job has been failed.
	 * @var ?DateTimeInterface
	 */
	public ?DateTimeInterface $timestampFailed = null;

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
	public function getTimestampSent(): ?DateTimeInterface
	{
		return $this->timestampSent;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setTimestampSent( ?DateTimeInterface $timestampSent ): void
	{
		$this->timestampSent = $timestampSent;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getTimestampFailed(): ?DateTimeInterface
	{
		return $this->timestampFailed;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setTimestampFailed( ?DateTimeInterface $timestampFailed ): void
	{
		$this->timestampFailed = $timestampFailed;
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
