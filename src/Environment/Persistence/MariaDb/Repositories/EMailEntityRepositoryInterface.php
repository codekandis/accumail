<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories;

use CodeKandis\AccuMail\Environment\Entities\Collections\EMailEntityCollectionInterface;
use CodeKandis\AccuMail\Environment\Entities\EMailEntityInterface;
use CodeKandis\AccuMail\Environment\Entities\JobEntityInterface;

/**
 * Represents the interface of any repository of any e-mail entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface EMailEntityRepositoryInterface
{
	/**
	 * Reads all e-mails.
	 * @return EMailEntityCollectionInterface The e-mails.
	 */
	public function readEMails(): EMailEntityCollectionInterface;

	/**
	 * Reads an e-mail by its record ID.
	 * @param EMailEntityInterface $eMail The e-mail with the record ID to find.
	 * @return ?EMailEntityInterface The e-mail if found, otherwise null.
	 */
	public function readEMailByRecordId( EMailEntityInterface $eMail ): ?EMailEntityInterface;

	/**
	 * Reads an e-mail by its ID.
	 * @param EMailEntityInterface $eMail The e-mail with the ID to find.
	 * @return ?EMailEntityInterface The e-mail if found, otherwise null.
	 */
	public function readEMailById( EMailEntityInterface $eMail ): ?EMailEntityInterface;

	/**
	 * Reads an e-mail by a job ID.
	 * @param JobEntityInterface $job The job with the ID to find.
	 * @return ?EMailEntityInterface The e-mail if found, otherwise null.
	 */
	public function readEMailByJobId( JobEntityInterface $job ): ?EMailEntityInterface;

	/**
	 * Creates an e-mail by its job ID.
	 * @param EMailEntityInterface $eMail The e-mail to create.
	 * @param JobEntityInterface $job The job with the job ID.
	 * @return EMailEntityInterface The e-mail with the record ID of the created e-mail.
	 */
	public function createEMailByJobId( EMailEntityInterface $eMail, JobEntityInterface $job ): EMailEntityInterface;
}
