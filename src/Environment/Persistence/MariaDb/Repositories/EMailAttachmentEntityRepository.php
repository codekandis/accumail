<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories;

use CodeKandis\AccuMail\Environment\Entities\EntityPropertyMappings\EntityPropertyMapperBuilder;
use CodeKandis\AccuMail\Environment\Entities\PersistableEMailAttachmentEntityInterface;
use CodeKandis\AccuMailEntities\Collections\EMailAttachmentEntityCollection;
use CodeKandis\AccuMailEntities\Collections\EMailAttachmentEntityCollectionInterface;
use CodeKandis\AccuMailEntities\EMailAttachmentEntityInterface;
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
 * Represents the MariaDB repository of the e-mail attachment entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class EMailAttachmentEntityRepository extends AbstractRepository implements EMailAttachmentEntityRepositoryInterface
{
	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The e-mail attachment entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readEMailAttachments(): EMailAttachmentEntityCollectionInterface
	{
		$query = <<< END
			SELECT
				`eMailAttachments`.*
			FROM
				`eMailAttachments`
			ORDER BY
				`eMailAttachments`.`_id` ASC;
		END;

		$eMailAttachmentEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildEMailAttachmentEntityPropertyMapper();

		return new EMailAttachmentEntityCollection(
			...$this->databaseConnector->query( $query, null, $eMailAttachmentEntityPropertyMapper )
		);
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The e-mail attachment entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readEMailAttachmentsByEMailId( EMailEntityInterface $eMail ): EMailAttachmentEntityCollectionInterface
	{
		$query = <<< END
			SELECT
				`eMailAttachments`.*
			FROM
				`eMailAttachments`
			WHERE
				`eMailAttachments`.`eMailId` = :eMailId
			ORDER BY
				`eMailAttachments`.`_id` ASC;
		END;

		$eMailEntityPropertyMapper           = ( new EntityPropertyMapperBuilder() )
			->buildEMailEntityPropertyMapper();
		$eMailAttachmentEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildEMailAttachmentEntityPropertyMapper();

		$mappedEMail = $eMailEntityPropertyMapper->mapToArray( $eMail );

		$arguments = [
			'eMailId' => $mappedEMail[ 'id' ]
		];

		return new EMailAttachmentEntityCollection(
			...$this->databaseConnector->query( $query, $arguments, $eMailAttachmentEntityPropertyMapper )
		);
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The e-mail attachment entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readEMailAttachmentsByEMailIdWithoutContent( EMailEntityInterface $eMail ): EMailAttachmentEntityCollectionInterface
	{
		$query = <<< END
			SELECT
				`eMailAttachments`.`_id`,
				`eMailAttachments`.`id`,
				`eMailAttachments`.`eMailId`,
				`eMailAttachments`.`name`
			FROM
				`eMailAttachments`
			WHERE
				`eMailAttachments`.`eMailId` = :eMailId
			ORDER BY
				`eMailAttachments`.`_id` ASC;
		END;

		$eMailEntityPropertyMapper           = ( new EntityPropertyMapperBuilder() )
			->buildEMailEntityPropertyMapper();
		$eMailAttachmentEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildEMailAttachmentEntityPropertyMapper();

		$mappedEMail = $eMailEntityPropertyMapper->mapToArray( $eMail );

		$arguments = [
			'eMailId' => $mappedEMail[ 'id' ]
		];

		return new EMailAttachmentEntityCollection(
			...$this->databaseConnector->query( $query, $arguments, $eMailAttachmentEntityPropertyMapper )
		);
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The e-mail attachment entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readEMailAttachmentByRecordId( PersistableEMailAttachmentEntityInterface $eMailAttachment ): ?EMailAttachmentEntityInterface
	{
		$query = <<< END
			SELECT
				`eMailAttachments`.*
			FROM
				`eMailAttachments`
			WHERE
				`eMailAttachments`.`_id` = :_id
			LIMIT
				0, 1;
		END;

		$persistableEMailAttachmentEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildPersistableEMailAttachmentEntityPropertyMapper();
		$eMailAttachmentEntityPropertyMapper            = ( new EntityPropertyMapperBuilder() )
			->buildEMailAttachmentEntityPropertyMapper();

		$mappedPersistableEMailAttachment = $persistableEMailAttachmentEntityPropertyMapper->mapToArray( $eMailAttachment );

		$arguments = [
			'_id' => $mappedPersistableEMailAttachment[ '_id' ]
		];

		return $this->databaseConnector->queryFirst( $query, $arguments, $eMailAttachmentEntityPropertyMapper );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The e-mail attachment entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readEMailAttachmentById( EMailAttachmentEntityInterface $eMailAttachment ): ?EMailAttachmentEntityInterface
	{
		$query = <<< END
			SELECT
				`eMailAttachments`.*
			FROM
				`eMailAttachments`
			WHERE
				`eMailAttachments`.`id` = :id
			LIMIT
				0, 1;
		END;

		$eMailAttachmentEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildEMailAttachmentEntityPropertyMapper();

		$mappedEMailAttachment = $eMailAttachmentEntityPropertyMapper->mapToArray( $eMailAttachment );

		$arguments = [
			'id' => $mappedEMailAttachment[ 'id' ]
		];

		return $this->databaseConnector->queryFirst( $query, $arguments, $eMailAttachmentEntityPropertyMapper );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The e-mail entity class to reflect does not exist.
	 * @throws ReflectionException The e-mail attachment entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readEMailAttachmentByEMailId( EMailEntityInterface $eMail ): ?EMailAttachmentEntityInterface
	{
		$query = <<< END
			SELECT
				`eMailAttachments`.*
			FROM
				`eMailAttachments`
			WHERE
				`eMailAttachments`.`eMailId` = :eMailId
			LIMIT
				0, 1;
		END;

		$eMailEntityPropertyMapper           = ( new EntityPropertyMapperBuilder() )
			->buildEMailEntityPropertyMapper();
		$eMailAttachmentEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildEMailAttachmentEntityPropertyMapper();

		$mappedEMail = $eMailEntityPropertyMapper->mapToArray( $eMail );

		$arguments = [
			'eMailId' => $mappedEMail[ 'id' ]
		];

		return $this->databaseConnector->queryFirst( $query, $arguments, $eMailAttachmentEntityPropertyMapper );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The e-mail attachment entity class to reflect does not exist.
	 * @throws ReflectionException The e-mail entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws InvalidArgumentsStatementsCountException The number of argument lists does not match the number of statements.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 */
	public function createEMailAttachmentByEMailId( EMailAttachmentEntityInterface $eMailAttachment, EMailEntityInterface $eMail ): PersistableEMailAttachmentEntityInterface
	{
		$query = <<< END
			INSERT INTO
				`eMailAttachments`
				( `id`, `eMailId`, `name`, `content` )
			VALUES
				( UUID( ), :eMailId, :name, :content );
		END;

		$eMailAttachmentEntityPropertyMapper            = ( new EntityPropertyMapperBuilder() )
			->buildEMailAttachmentEntityPropertyMapper();
		$eMailEntityPropertyMapper                      = ( new EntityPropertyMapperBuilder() )
			->buildEMailEntityPropertyMapper();
		$persistableEMailAttachmentEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildPersistableEMailAttachmentEntityPropertyMapper();

		$mappedEMailAttachment = $eMailAttachmentEntityPropertyMapper->mapToArray( $eMailAttachment );
		$mappedEMail           = $eMailEntityPropertyMapper->mapToArray( $eMail );
		$arguments             = [
			'eMailId' => $mappedEMail[ 'id' ],
			'name'    => $mappedEMailAttachment[ 'name' ],
			'content' => $mappedEMailAttachment[ 'content' ]
		];

		$this->databaseConnector->execute( $query, $arguments );

		return $persistableEMailAttachmentEntityPropertyMapper->mapFromArray(
			[
				'_id' => $this->databaseConnector->getLastInsertId()
			]
		);
	}
}
