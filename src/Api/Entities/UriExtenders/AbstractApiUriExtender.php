<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Api\Entities\UriExtenders;

use CodeKandis\AccuMail\Api\Http\UriBuilders\ApiUriBuilderInterface;
use CodeKandis\Tiphy\Entities\UriExtenders\UriExtenderInterface;

/**
 * Represents the base class of any API URI extender.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class AbstractApiUriExtender implements UriExtenderInterface
{
	/**
	 * Stores the API URI builder the API URI extender depends on.
	 * @var ApiUriBuilderInterface
	 */
	protected ApiUriBuilderInterface $apiUriBuilder;

	/**
	 * Constructor method.
	 * @param ApiUriBuilderInterface $apiUriBuilder The API URI builder the API URI extender depends on.
	 */
	public function __construct( ApiUriBuilderInterface $apiUriBuilder )
	{
		$this->apiUriBuilder = $apiUriBuilder;
	}
}
