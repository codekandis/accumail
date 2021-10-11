<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

/**
 * Represents an e-mail attachment entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class EMailAttachmentEntity extends AbstractEMailRelatedEntity implements EMailAttachmentEntityInterface
{
	/**
	 * Stores the name.
	 * @var string
	 */
	public string $name = '';

	/**
	 * Stores the content.
	 * @var string
	 */
	public string $content = '';

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
	public function getContent(): string
	{
		return $this->content;
	}

	/**
	 * {@inheritDoc}
	 */
	public function setContent( string $content ): void
	{
		$this->content = $content;
	}
}
