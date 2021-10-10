<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories;

use CodeKandis\AccuMail\Environment\Entities\Collections\EMailAddressEntityCollectionInterface;
use CodeKandis\AccuMail\Environment\Entities\EMailAddressEntityInterface;
use CodeKandis\AccuMail\Environment\Entities\EMailEntityInterface;

/**
 * Represents the interface of any repository of any e-mail address entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
interface EMailAddressEntityRepositoryInterface
{
	/**
	 * Reads all e-mail addresses.
	 * @return EMailAddressEntityCollectionInterface The e-mail addresses.
	 */
	public function readEMailAddresses(): EMailAddressEntityCollectionInterface;

	/**
	 * Reads all e-mail addresses.
	 * @param EMailEntityInterface $eMail The e-mail with the ID to find.
	 * @param EMailAddressEntityInterface $eMailAddress The e-mail address with the type to find.
	 * @return EMailAddressEntityCollectionInterface The e-mail addresses.
	 */
	public function readEMailAddressesByEMailIdAndType( EMailEntityInterface $eMail, EMailAddressEntityInterface $eMailAddress ): EMailAddressEntityCollectionInterface;

	/**
	 * Reads an e-mail address by its record ID.
	 * @param EMailAddressEntityInterface $eMailAddress The e-mail address with the record ID to find.
	 * @return ?EMailAddressEntityInterface The e-mail address if found, otherwise null.
	 */
	public function readEMailAddressByRecordId( EMailAddressEntityInterface $eMailAddress ): ?EMailAddressEntityInterface;

	/**
	 * Reads an e-mail address by its ID.
	 * @param EMailAddressEntityInterface $eMailAddress The e-mail address with the ID to find.
	 * @return ?EMailAddressEntityInterface The e-mail address if found, otherwise null.
	 */
	public function readEMailAddressById( EMailAddressEntityInterface $eMailAddress ): ?EMailAddressEntityInterface;

	/**
	 * Reads an e-mail address by a e-mail ID.
	 * @param EMailEntityInterface $eMail The e-mail with the ID to find.
	 * @return ?EMailAddressEntityInterface The e-mail address if found, otherwise null.
	 */
	public function readEMailAddressByEMailId( EMailEntityInterface $eMail ): ?EMailAddressEntityInterface;

	/**
	 * Creates an e-mail address by its e-mail ID.
	 * @param EMailAddressEntityInterface $eMailAddress The e-mail address to create.
	 * @param EMailEntityInterface $eMail The e-mail with the e-mail ID.
	 * @return EMailAddressEntityInterface The e-mail address with the record ID of the created e-mail address.
	 */
	public function createEMailAddressByEMailId( EMailAddressEntityInterface $eMailAddress, EMailEntityInterface $eMail ): EMailAddressEntityInterface;
}
