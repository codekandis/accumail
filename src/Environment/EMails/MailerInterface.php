<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\EMails;

/**
 * Represents the interface of any mailer.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface MailerInterface
{
	/**
	 * Processes the job.
	 */
	public function process(): void;
}
