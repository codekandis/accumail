<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories;

use CodeKandis\AccuMail\Environment\Entities\ApiKeyEntityInterface;
use CodeKandis\AccuMail\Environment\Entities\Collections\ApiKeyEntityCollectionInterface;

/**
 * Represents the interface of any repository of any API key entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ApiKeyEntityRepositoryInterface
{
	/**
	 * Reads all API keys.
	 * @return ApiKeyEntityCollectionInterface The API keys.
	 */
	public function readApiKeys(): ApiKeyEntityCollectionInterface;

	/**
	 * Reads an API key by its record ID.
	 * @param ApiKeyEntityInterface $apiKey The API key with the record ID to find.
	 * @return ?ApiKeyEntityInterface The API key if found, otherwise null.
	 */
	public function readApiKeyByRecordId( ApiKeyEntityInterface $apiKey ): ?ApiKeyEntityInterface;

	/**
	 * Reads an API key by its ID.
	 * @param ApiKeyEntityInterface $apiKey The API key with the ID to find.
	 * @return ?ApiKeyEntityInterface The API key if found, otherwise null.
	 */
	public function readApiKeyById( ApiKeyEntityInterface $apiKey ): ?ApiKeyEntityInterface;
}
