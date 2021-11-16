<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Api\Entities\UriExtenders;

use CodeKandis\AccuMail\Api\Http\UriBuilders\ApiUriBuilderInterface;
use CodeKandis\AccuMailEntities\UserEntityInterface;

/**
 * Represents an API URI extender of any user.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class UserApiUriExtender extends AbstractApiUriExtender
{
	/**
	 * Stores the user to extend its URIs.
	 * @var UserEntityInterface
	 */
	private UserEntityInterface $user;

	/**
	 * Constructor method.
	 * @param ApiUriBuilderInterface $apiUriBuilder The API URI builder the API URI extender depends on.
	 * @param UserEntityInterface $user The user to extend its URIs.
	 */
	public function __construct( ApiUriBuilderInterface $apiUriBuilder, UserEntityInterface $user )
	{
		parent::__construct( $apiUriBuilder );

		$this->user = $user;
	}

	/**
	 * {@inheritDoc}
	 */
	public function extend(): void
	{
		$this->addCanonicalUri();
	}

	/**
	 * Adds the canonical URI of the user .
	 */
	private function addCanonicalUri(): void
	{
		$this->user->setCanonicalUri(
			$this->apiUriBuilder->buildUserUri(
				$this->user->getId()
			)
		);
	}
}
