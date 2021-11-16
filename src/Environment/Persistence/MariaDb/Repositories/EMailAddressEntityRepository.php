<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories;

use CodeKandis\AccuMail\Environment\Entities\EntityPropertyMappings\EntityPropertyMapperBuilder;
use CodeKandis\AccuMail\Environment\Entities\PersistableEMailAddressEntityInterface;
use CodeKandis\AccuMailEntities\Collections\EMailAddressEntityCollection;
use CodeKandis\AccuMailEntities\Collections\EMailAddressEntityCollectionInterface;
use CodeKandis\AccuMailEntities\EMailAddressEntityInterface;
use CodeKandis\AccuMailEntities\EMailEntityInterface;
use CodeKandis\Persistence\FetchingResultFailedException;
use CodeKandis\Persistence\InvalidArgumentsStatementsCountException;
use CodeKandis\Persistence\Repositories\AbstractRepository;
use CodeKandis\Persistence\SettingFetchModeFailedException;
use CodeKandis\Persistence\StatementExecutionFailedException;
use CodeKandis\Persistence\StatementPreparationFailedException;
use CodeKandis\Persistence\TransactionCommitFailedException;
use CodeKandis\Persistence\TransactionRollbackFailedException;
use CodeKandis\Persistence\TransactionStartFailedException;
use ReflectionException;

/**
 * Represents the MariaDB repository of the e-mail address entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class EMailAddressEntityRepository extends AbstractRepository implements EMailAddressEntityRepositoryInterface
{
	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The e-mail address entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readEMailAddresses(): EMailAddressEntityCollectionInterface
	{
		$query = <<< END
			SELECT
				`eMailAddresses`.*
			FROM
				`eMailAddresses`
			ORDER BY
				`eMailAddresses`.`_id` ASC;
		END;

		$eMailAddressEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildEMailAddressEntityPropertyMapper();

		return new EMailAddressEntityCollection(
			...$this->databaseConnector->query( $query, null, $eMailAddressEntityPropertyMapper )
		);
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The e-mail entity class to reflect does not exist.
	 * @throws ReflectionException The e-mail address entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readEMailAddressesByEMailIdAndType( EMailEntityInterface $eMail, EMailAddressEntityInterface $eMailAddress ): EMailAddressEntityCollectionInterface
	{
		$query = <<< END
			SELECT
				`eMailAddresses`.*
			FROM
				`eMailAddresses`
			WHERE
				`eMailAddresses`.`eMailId` = :eMailId
				AND
				`eMailAddresses`.`type` = :type
			ORDER BY
				`eMailAddresses`.`_id` ASC;
		END;

		$eMailEntityPropertyMapper        = ( new EntityPropertyMapperBuilder() )
			->buildEMailEntityPropertyMapper();
		$eMailAddressEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildEMailAddressEntityPropertyMapper();

		$mappedEMail        = $eMailEntityPropertyMapper->mapToArray( $eMail );
		$mappedEMailAddress = $eMailAddressEntityPropertyMapper->mapToArray( $eMailAddress );

		$arguments = [
			'eMailId' => $mappedEMail[ 'id' ],
			'type'    => $mappedEMailAddress[ 'type' ]
		];

		return new EMailAddressEntityCollection(
			...$this->databaseConnector->query( $query, $arguments, $eMailAddressEntityPropertyMapper )
		);
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The e-mail address entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readEMailAddressByRecordId( PersistableEMailAddressEntityInterface $eMailAddress ): ?EMailAddressEntityInterface
	{
		$query = <<< END
			SELECT
				`eMailAddresses`.*
			FROM
				`eMailAddresses`
			WHERE
				`eMailAddresses`.`_id` = :_id
			LIMIT
				0, 1;
		END;

		$persistableEMailAddressEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildPersistableEMailAddressEntityPropertyMapper();
		$eMailAddressEntityPropertyMapper            = ( new EntityPropertyMapperBuilder() )
			->buildEMailAddressEntityPropertyMapper();

		$mappedPersistableEMailAddress = $persistableEMailAddressEntityPropertyMapper->mapToArray( $eMailAddress );

		$arguments = [
			'_id' => $mappedPersistableEMailAddress[ '_id' ]
		];

		return $this->databaseConnector->queryFirst( $query, $arguments, $eMailAddressEntityPropertyMapper );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The e-mail address entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readEMailAddressById( EMailAddressEntityInterface $eMailAddress ): ?EMailAddressEntityInterface
	{
		$query = <<< END
			SELECT
				`eMailAddresses`.*
			FROM
				`eMailAddresses`
			WHERE
				`eMailAddresses`.`id` = :id
			LIMIT
				0, 1;
		END;

		$eMailAddressEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildEMailAddressEntityPropertyMapper();

		$mappedEMailAddress = $eMailAddressEntityPropertyMapper->mapToArray( $eMailAddress );

		$arguments = [
			'id' => $mappedEMailAddress[ 'id' ]
		];

		return $this->databaseConnector->queryFirst( $query, $arguments, $eMailAddressEntityPropertyMapper );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The e-mail entity class to reflect does not exist.
	 * @throws ReflectionException The e-mail address entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readEMailAddressByEMailId( EMailEntityInterface $eMail ): ?EMailAddressEntityInterface
	{
		$query = <<< END
			SELECT
				`eMailAddresses`.*
			FROM
				`eMailAddresses`
			WHERE
				`eMailAddresses`.`eMailId` = :eMailId
			LIMIT
				0, 1;
		END;

		$eMailEntityPropertyMapper        = ( new EntityPropertyMapperBuilder() )
			->buildEMailEntityPropertyMapper();
		$eMailAddressEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildEMailAddressEntityPropertyMapper();

		$mappedEMail = $eMailEntityPropertyMapper->mapToArray( $eMail );

		$arguments = [
			'eMailId' => $mappedEMail[ 'id' ]
		];

		return $this->databaseConnector->queryFirst( $query, $arguments, $eMailAddressEntityPropertyMapper );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The e-mail address entity class to reflect does not exist.
	 * @throws ReflectionException The e-mail entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws InvalidArgumentsStatementsCountException The number of argument lists does not match the number of statements.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 */
	public function createEMailAddressByEMailId( EMailAddressEntityInterface $eMailAddress, EMailEntityInterface $eMail ): PersistableEMailAddressEntityInterface
	{
		$query = <<< END
			INSERT INTO
				`eMailAddresses`
				( `id`, `eMailId`, `type`, `name`, `address` )
			VALUES
				( UUID( ), :eMailId, :type, :name, :address );
		END;

		$eMailAddressEntityPropertyMapper            = ( new EntityPropertyMapperBuilder() )
			->buildEMailAddressEntityPropertyMapper();
		$eMailEntityPropertyMapper                   = ( new EntityPropertyMapperBuilder() )
			->buildEMailEntityPropertyMapper();
		$persistableEMailAddressEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildPersistableEMailAddressEntityPropertyMapper();

		$mappedEMailAddress = $eMailAddressEntityPropertyMapper->mapToArray( $eMailAddress );
		$mappedEMail        = $eMailEntityPropertyMapper->mapToArray( $eMail );

		$arguments = [
			'eMailId' => $mappedEMail[ 'id' ],
			'type'    => $mappedEMailAddress[ 'type' ],
			'name'    => $mappedEMailAddress[ 'name' ],
			'address' => $mappedEMailAddress[ 'address' ]
		];

		$this->databaseConnector->execute( $query, $arguments );

		return $persistableEMailAddressEntityPropertyMapper->mapFromArray(
			[
				'_id' => $this->databaseConnector->getLastInsertId()
			]
		);
	}
}
