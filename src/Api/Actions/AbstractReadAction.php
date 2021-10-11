<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Api\Actions;

/**
 * Represents the base class of all read actions.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class AbstractReadAction extends AbstractAction
{
	/**
	 * Gets the input data of the request.
	 * @return array The input data of the request.
	 */
	protected function getInputData(): array
	{
		return $this->arguments;
	}
}
