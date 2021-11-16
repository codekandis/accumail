<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Entities;

use CodeKandis\AccuMailEntities\ApiKeyEntityInterface;

/**
 * Represents the interface of any API key entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface PersistableApiKeyEntityInterface extends ApiKeyEntityInterface, PersistableEntityInterface
{
}
