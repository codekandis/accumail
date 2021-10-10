<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Api\Actions\Get;

use CodeKandis\AccuMail\Api\Actions\AbstractReadAction;
use CodeKandis\AccuMail\Api\Entities\IndexEntity;
use CodeKandis\AccuMail\Api\Entities\IndexEntityInterface;
use CodeKandis\AccuMail\Api\Entities\UriExtenders\IndexApiUriExtender;
use CodeKandis\Tiphy\Http\Responses\JsonResponder;
use CodeKandis\Tiphy\Http\Responses\StatusCodes;
use JsonException;

/**
 * Represents the API action to get the API index.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class IndexAction extends AbstractReadAction
{
	/**
	 * {@inheritDoc}
	 * @throws JsonException An error occurred during the serialization of the response.
	 */
	public function execute(): void
	{
		$index = new IndexEntity();
		$this->extendUris( $index );

		( new JsonResponder(
			StatusCodes::OK,
			[
				'index' => $index
			]
		) )
			->respond();
	}

	/**
	 * Extends the URIs of an index.
	 * @param IndexEntityInterface $index The index to extends its URIs.
	 */
	private function extendUris( IndexEntityInterface $index ): void
	{
		( new IndexApiUriExtender(
			$this->getApiUriBuilder(),
			$index
		) )
			->extend();
	}
}
