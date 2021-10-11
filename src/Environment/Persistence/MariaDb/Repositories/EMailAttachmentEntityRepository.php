<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories;

use CodeKandis\AccuMail\Environment\Entities\Collections\EMailAttachmentEntityCollection;
use CodeKandis\AccuMail\Environment\Entities\Collections\EMailAttachmentEntityCollectionInterface;
use CodeKandis\AccuMail\Environment\Entities\EMailAttachmentEntity;
use CodeKandis\AccuMail\Environment\Entities\EMailAttachmentEntityInterface;
use CodeKandis\AccuMail\Environment\Entities\EMailEntityInterface;
use CodeKandis\AccuMail\Environment\Entities\EntityPropertyMappings\EntityPropertyMapperBuilder;
use CodeKandis\Tiphy\Persistence\MariaDb\FetchingResultFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\InvalidArgumentsStatementsCountException;
use CodeKandis\Tiphy\Persistence\MariaDb\Repositories\AbstractRepository;
use CodeKandis\Tiphy\Persistence\MariaDb\SettingFetchModeFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\StatementExecutionFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\StatementPreparationFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\TransactionCommitFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\TransactionRollbackFailedException;
use CodeKandis\Tiphy\Persistence\MariaDb\TransactionStartFailedException;
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
		$mappedEMail                         = $eMailEntityPropertyMapper->mapToArray( $eMail );
		$arguments                           = [
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
		$mappedEMail                         = $eMailEntityPropertyMapper->mapToArray( $eMail );
		$arguments                           = [
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
	public function readEMailAttachmentByRecordId( EMailAttachmentEntityInterface $eMailAttachment ): ?EMailAttachmentEntityInterface
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

		$eMailAttachmentEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildEMailAttachmentEntityPropertyMapper();
		$mappedEMailAttachment               = $eMailAttachmentEntityPropertyMapper->mapToArray( $eMailAttachment );
		$arguments                           = [
			'_id' => $mappedEMailAttachment[ '_id' ]
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
		$mappedEMailAttachment               = $eMailAttachmentEntityPropertyMapper->mapToArray( $eMailAttachment );
		$arguments                           = [
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
		$mappedEMail                         = $eMailEntityPropertyMapper->mapToArray( $eMail );
		$arguments                           = [
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
	public function createEMailAttachmentByEMailId( EMailAttachmentEntityInterface $eMailAttachment, EMailEntityInterface $eMail ): EMailAttachmentEntityInterface
	{
		$query = <<< END
			INSERT INTO
				`eMailAttachments`
				( `id`, `eMailId`, `name`, `content` )
			VALUES
				( UUID( ), :eMailId, :name, :content );
		END;

		$eMailAttachmentEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildEMailAttachmentEntityPropertyMapper();
		$mappedEMailAttachment               = $eMailAttachmentEntityPropertyMapper->mapToArray( $eMailAttachment );
		$eMailEntityPropertyMapper           = ( new EntityPropertyMapperBuilder() )
			->buildEMailEntityPropertyMapper();
		$mappedEMail                         = $eMailEntityPropertyMapper->mapToArray( $eMail );
		$arguments                           = [
			'eMailId' => $mappedEMail[ 'id' ],
			'name'    => $mappedEMailAttachment[ 'name' ],
			'content' => $mappedEMailAttachment[ 'content' ]
		];

		$this->databaseConnector->execute( $query, $arguments );

		return EMailAttachmentEntity::fromArray(
			[
				'_id' => $this->databaseConnector->getLastInsertId()
			]
		);
	}
}
