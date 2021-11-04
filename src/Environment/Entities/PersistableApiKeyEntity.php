<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

use CodeKandis\AccuMailEntities\ApiKeyEntity;

/**
 * Represents an API key entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class PersistableApiKeyEntity extends ApiKeyEntity implements PersistableApiKeyEntityInterface
{
	use PersistableEntityTrait;
}
