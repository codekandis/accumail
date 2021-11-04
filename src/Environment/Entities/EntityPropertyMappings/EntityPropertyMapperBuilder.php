<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities\EntityPropertyMappings;

use CodeKandis\AccuMail\Environment\Entities\PersistableApiKeyEntity;
use CodeKandis\AccuMail\Environment\Entities\PersistableEMailAddressEntity;
use CodeKandis\AccuMail\Environment\Entities\PersistableEMailAttachmentEntity;
use CodeKandis\AccuMail\Environment\Entities\PersistableEMailEntity;
use CodeKandis\AccuMail\Environment\Entities\PersistableJobEntity;
use CodeKandis\AccuMail\Environment\Entities\PersistableServerConnectionAuthenticationCredentialEntity;
use CodeKandis\AccuMail\Environment\Entities\PersistableServerConnectionEntity;
use CodeKandis\AccuMail\Environment\Entities\PersistableUserEntity;
use CodeKandis\AccuMailEntities\ApiKeyEntity;
use CodeKandis\AccuMailEntities\EMailAddressEntity;
use CodeKandis\AccuMailEntities\EMailAttachmentEntity;
use CodeKandis\AccuMailEntities\EMailEntity;
use CodeKandis\AccuMailEntities\JobEntity;
use CodeKandis\AccuMailEntities\ServerConnectionAuthenticationCredentialEntity;
use CodeKandis\AccuMailEntities\ServerConnectionEntity;
use CodeKandis\AccuMailEntities\UserEntity;
use CodeKandis\Entities\EntityPropertyMappings\EntityPropertyMapper;
use CodeKandis\Entities\EntityPropertyMappings\EntityPropertyMapperInterface;
use ReflectionException;

/**
 * Represents an entity property mapper builder.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class EntityPropertyMapperBuilder implements EntityPropertyMapperBuilderInterface
{
	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The user entity class to reflect does not exist.
	 */
	public function buildUserEntityPropertyMapper(): EntityPropertyMapperInterface
	{
		return new EntityPropertyMapper( UserEntity::class, new UserEntityPropertyMappings() );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The persistable user entity class to reflect does not exist.
	 */
	public function buildPersistableUserEntityPropertyMapper(): EntityPropertyMapperInterface
	{
		return new EntityPropertyMapper( PersistableUserEntity::class, new PersistableUserEntityPropertyMappings() );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The API key entity class to reflect does not exist.
	 */
	public function buildApiKeyEntityPropertyMapper(): EntityPropertyMapperInterface
	{
		return new EntityPropertyMapper( ApiKeyEntity::class, new ApiKeyEntityPropertyMappings() );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The persistable API key entity class to reflect does not exist.
	 */
	public function buildPersistableApiKeyEntityPropertyMapper(): EntityPropertyMapperInterface
	{
		return new EntityPropertyMapper( PersistableApiKeyEntity::class, new PersistableApiKeyEntityPropertyMappings() );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The job entity class to reflect does not exist.
	 */
	public function buildJobEntityPropertyMapper(): EntityPropertyMapperInterface
	{
		return new EntityPropertyMapper( JobEntity::class, new JobEntityPropertyMappings() );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The persistable job entity class to reflect does not exist.
	 */
	public function buildPersistableJobEntityPropertyMapper(): EntityPropertyMapperInterface
	{
		return new EntityPropertyMapper( PersistableJobEntity::class, new PersistableJobEntityPropertyMappings() );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The server connection entity class to reflect does not exist.
	 */
	public function buildServerConnectionEntityPropertyMapper(): EntityPropertyMapperInterface
	{
		return new EntityPropertyMapper( ServerConnectionEntity::class, new ServerConnectionEntityPropertyMappings() );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The persistable server connection entity class to reflect does not exist.
	 */
	public function buildPersistableServerConnectionEntityPropertyMapper(): EntityPropertyMapperInterface
	{
		return new EntityPropertyMapper( PersistableServerConnectionEntity::class, new PersistableServerConnectionEntityPropertyMappings() );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The server connection authentication credential entity class to reflect does not exist.
	 */
	public function buildServerConnectionAuthenticationCredentialEntityPropertyMapper(): EntityPropertyMapperInterface
	{
		return new EntityPropertyMapper( ServerConnectionAuthenticationCredentialEntity::class, new ServerConnectionAuthenticationCredentialEntityPropertyMappings() );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The persistable server connection authentication credential entity class to reflect does not exist.
	 */
	public function buildPersistableServerConnectionAuthenticationCredentialEntityPropertyMapper(): EntityPropertyMapperInterface
	{
		return new EntityPropertyMapper( PersistableServerConnectionAuthenticationCredentialEntity::class, new PersistableServerConnectionAuthenticationCredentialEntityPropertyMappings() );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The e-mail entity class to reflect does not exist.
	 */
	public function buildEMailEntityPropertyMapper(): EntityPropertyMapperInterface
	{
		return new EntityPropertyMapper( EMailEntity::class, new EMailEntityPropertyMappings() );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The persistable e-mail entity class to reflect does not exist.
	 */
	public function buildPersistableEMailEntityPropertyMapper(): EntityPropertyMapperInterface
	{
		return new EntityPropertyMapper( PersistableEMailEntity::class, new PersistableEMailEntityPropertyMappings() );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The e-mail address entity class to reflect does not exist.
	 */
	public function buildEMailAddressEntityPropertyMapper(): EntityPropertyMapperInterface
	{
		return new EntityPropertyMapper( EMailAddressEntity::class, new EMailAddressEntityPropertyMappings() );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The persistable e-mail address entity class to reflect does not exist.
	 */
	public function buildPersistableEMailAddressEntityPropertyMapper(): EntityPropertyMapperInterface
	{
		return new EntityPropertyMapper( PersistableEMailAddressEntity::class, new PersistableEMailAddressEntityPropertyMappings() );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The e-mail attachment entity class to reflect does not exist.
	 */
	public function buildEMailAttachmentEntityPropertyMapper(): EntityPropertyMapperInterface
	{
		return new EntityPropertyMapper( EMailAttachmentEntity::class, new EMailAttachmentEntityPropertyMappings() );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The persistable e-mail attachment entity class to reflect does not exist.
	 */
	public function buildPersistableEMailAttachmentEntityPropertyMapper(): EntityPropertyMapperInterface
	{
		return new EntityPropertyMapper( PersistableEMailAttachmentEntity::class, new PersistableEMailAttachmentEntityPropertyMappings() );
	}
}
