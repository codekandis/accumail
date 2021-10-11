<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Api\Actions;

use CodeKandis\AccuMail\Environment\Errors\CommonErrorCodes;
use CodeKandis\AccuMail\Environment\Errors\CommonErrorMessages;
use CodeKandis\Tiphy\Http\ContentTypes;
use CodeKandis\Tiphy\Http\Requests\BadRequestException;
use CodeKandis\Tiphy\Validators\ArrayValidators\MappedArrayValidatorInterface;
use function is_object;
use function property_exists;
use function strtolower;

/**
 * Represents the base class of all write actions.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class AbstractWriteAction extends AbstractAction
{
	/**
	 * Gets the input data of the request.
	 * @param array $requiredKeys The required object keys of the JSON body.
	 * @param ?MappedArrayValidatorInterface $mappedArrayValidator The mapped array validator to validate the input data.
	 * @return array The input data of the request.
	 * @throws BadRequestException The request content type is invalid.
	 * @throws BadRequestException The request body is malformed.
	 * @throws BadRequestException The request body is invalid.
	 */
	protected function getInputData( array $requiredKeys, ?MappedArrayValidatorInterface $mappedArrayValidator = null ): array
	{
		if ( ContentTypes::APPLICATION_JSON !== strtolower( $_SERVER[ 'CONTENT_TYPE' ] ) )
		{
			throw new BadRequestException( CommonErrorMessages::INVALID_CONTENT_TYPE, CommonErrorCodes::INVALID_CONTENT_TYPE );
		}
		$requestBody = $this->requestBody->getContent();

		$isValid = is_object( $requestBody );
		if ( false === $isValid )
		{
			throw new BadRequestException( CommonErrorMessages::MALFORMED_REQUEST_BODY, CommonErrorCodes::MALFORMED_REQUEST_BODY );
		}

		$bodyData = [];

		$isValid = true;
		foreach ( $requiredKeys as $requiredKey )
		{
			$isValid = $isValid && property_exists( $requestBody, $requiredKey );
			if ( false === $isValid )
			{
				break;
			}
			$bodyData[ $requiredKey ] = $requestBody->{$requiredKey};
		}
		if ( false === $isValid )
		{
			throw new BadRequestException( CommonErrorMessages::INVALID_REQUEST_BODY, CommonErrorCodes::INVALID_REQUEST_BODY );
		}

		$inputData = $bodyData + $this->arguments;
		if ( null !== $mappedArrayValidator && false === $mappedArrayValidator->validate( $inputData ) )
		{
			throw new BadRequestException( CommonErrorMessages::INVALID_REQUEST_BODY, CommonErrorCodes::INVALID_REQUEST_BODY );
		}

		return $inputData;
	}
}
