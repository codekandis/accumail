<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities\EntityPropertyMappings;

use CodeKandis\AccuMail\Environment\Entities\ApiKeyEntity;
use CodeKandis\AccuMail\Environment\Entities\EMailAddressEntity;
use CodeKandis\AccuMail\Environment\Entities\EMailAttachmentEntity;
use CodeKandis\AccuMail\Environment\Entities\EMailEntity;
use CodeKandis\AccuMail\Environment\Entities\JobEntity;
use CodeKandis\AccuMail\Environment\Entities\ServerConnectionAuthenticationCredentialEntity;
use CodeKandis\AccuMail\Environment\Entities\ServerConnectionEntity;
use CodeKandis\AccuMail\Environment\Entities\UserEntity;
use CodeKandis\Tiphy\Entities\EntityPropertyMappings\EntityPropertyMapper;
use CodeKandis\Tiphy\Entities\EntityPropertyMappings\EntityPropertyMapperInterface;
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
	 * @throws ReflectionException The API key entity class to reflect does not exist.
	 */
	public function buildApiKeyEntityPropertyMapper(): EntityPropertyMapperInterface
	{
		return new EntityPropertyMapper( ApiKeyEntity::class, new ApiKeyEntityPropertyMappings() );
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
	 * @throws ReflectionException The server connection entity class to reflect does not exist.
	 */
	public function buildServerConnectionEntityPropertyMapper(): EntityPropertyMapperInterface
	{
		return new EntityPropertyMapper( ServerConnectionEntity::class, new ServerConnectionEntityPropertyMappings() );
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
	 * @throws ReflectionException The e-mail entity class to reflect does not exist.
	 */
	public function buildEMailEntityPropertyMapper(): EntityPropertyMapperInterface
	{
		return new EntityPropertyMapper( EMailEntity::class, new EMailEntityPropertyMappings() );
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
	 * @throws ReflectionException The e-mail attachment entity class to reflect does not exist.
	 */
	public function buildEMailAttachmentEntityPropertyMapper(): EntityPropertyMapperInterface
	{
		return new EntityPropertyMapper( EMailAttachmentEntity::class, new EMailAttachmentEntityPropertyMappings() );
	}
}
