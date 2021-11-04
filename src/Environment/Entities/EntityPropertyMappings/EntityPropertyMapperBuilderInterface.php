<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities\EntityPropertyMappings;

use CodeKandis\Entities\EntityPropertyMappings\EntityPropertyMapperInterface;

/**
 * Represents the interface of any entity property mapper builder.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface EntityPropertyMapperBuilderInterface
{
	/**
	 * Builds the entity property mapper of the user entity.
	 * @return EntityPropertyMapperInterface The entity property mapper of the user entity.
	 */
	public function buildUserEntityPropertyMapper(): EntityPropertyMapperInterface;

	/**
	 * Builds the entity property mapper of the persistable user entity.
	 * @return EntityPropertyMapperInterface The entity property mapper of the persistable user entity.
	 */
	public function buildPersistableUserEntityPropertyMapper(): EntityPropertyMapperInterface;

	/**
	 * Builds the entity property mapper of the API key entity.
	 * @return EntityPropertyMapperInterface The entity property mapper of the API key entity.
	 */
	public function buildApiKeyEntityPropertyMapper(): EntityPropertyMapperInterface;

	/**
	 * Builds the entity property mapper of the persistable API key entity.
	 * @return EntityPropertyMapperInterface The entity property mapper of the persistable API key entity.
	 */
	public function buildPersistableApiKeyEntityPropertyMapper(): EntityPropertyMapperInterface;

	/**
	 * Builds the entity property mapper of the job entity.
	 * @return EntityPropertyMapperInterface The entity property mapper of the job entity.
	 */
	public function buildJobEntityPropertyMapper(): EntityPropertyMapperInterface;

	/**
	 * Builds the entity property mapper of the persistable job entity.
	 * @return EntityPropertyMapperInterface The entity property mapper of the persistable job entity.
	 */
	public function buildPersistableJobEntityPropertyMapper(): EntityPropertyMapperInterface;

	/**
	 * Builds the entity property mapper of the server connection entity.
	 * @return EntityPropertyMapperInterface The entity property mapper of the server connection entity.
	 */
	public function buildServerConnectionEntityPropertyMapper(): EntityPropertyMapperInterface;

	/**
	 * Builds the entity property mapper of the persistable server connection entity.
	 * @return EntityPropertyMapperInterface The entity property mapper of the persistable server connection entity.
	 */
	public function buildPersistableServerConnectionEntityPropertyMapper(): EntityPropertyMapperInterface;

	/**
	 * Builds the entity property mapper of the server connection authentication credential entity.
	 * @return EntityPropertyMapperInterface The entity property mapper of the server connection authentication credential entity.
	 */
	public function buildServerConnectionAuthenticationCredentialEntityPropertyMapper(): EntityPropertyMapperInterface;

	/**
	 * Builds the entity property mapper of the persistable server connection authentication credential entity.
	 * @return EntityPropertyMapperInterface The entity property mapper of the persistable server connection authentication credential entity.
	 */
	public function buildPersistableServerConnectionAuthenticationCredentialEntityPropertyMapper(): EntityPropertyMapperInterface;

	/**
	 * Builds the entity property mapper of the e-mail entity.
	 * @return EntityPropertyMapperInterface The entity property mapper of the e-mail entity.
	 */
	public function buildEMailEntityPropertyMapper(): EntityPropertyMapperInterface;

	/**
	 * Builds the entity property mapper of the persistable e-mail entity.
	 * @return EntityPropertyMapperInterface The entity property mapper of the persistable e-mail entity.
	 */
	public function buildPersistableEMailEntityPropertyMapper(): EntityPropertyMapperInterface;

	/**
	 * Builds the entity property mapper of the e-mail address entity.
	 * @return EntityPropertyMapperInterface The entity property mapper of the e-mail address entity.
	 */
	public function buildEMailAddressEntityPropertyMapper(): EntityPropertyMapperInterface;

	/**
	 * Builds the entity property mapper of the persistable e-mail address entity.
	 * @return EntityPropertyMapperInterface The entity property mapper of the persistable e-mail address entity.
	 */
	public function buildPersistableEMailAddressEntityPropertyMapper(): EntityPropertyMapperInterface;

	/**
	 * Builds the entity property mapper of the e-mail attachment entity.
	 * @return EntityPropertyMapperInterface The entity property mapper of the e-mail attachment entity.
	 */
	public function buildEMailAttachmentEntityPropertyMapper(): EntityPropertyMapperInterface;

	/**
	 * Builds the entity property mapper of the persistable e-mail attachment entity.
	 * @return EntityPropertyMapperInterface The entity property mapper of the persistable e-mail attachment entity.
	 */
	public function buildPersistableEMailAttachmentEntityPropertyMapper(): EntityPropertyMapperInterface;
}
