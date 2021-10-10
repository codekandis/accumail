<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

/**
 * Represents the base class of any server connection related entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class AbstractServerConnectionRelatedEntity extends AbstractEntity implements ServerConnectionRelatedEntityInterface
{
	/**
	 * Stores the server connection ID.
	 * @var string
	 */
	public string $serverConnectionId = '';

	/**
	 * {@inheritDoc}
	 */
	public function getServerConnectionId(): string
	{
		return $this->serverConnectionId;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setServerConnectionId( string $serverConnectionId ): void
	{
		$this->serverConnectionId = $serverConnectionId;
	}
}
