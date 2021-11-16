<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories;

use CodeKandis\AccuMail\Environment\Entities\EntityPropertyMappings\EntityPropertyMapperBuilder;
use CodeKandis\AccuMail\Environment\Entities\PersistableEMailEntityInterface;
use CodeKandis\AccuMailEntities\Collections\EMailEntityCollection;
use CodeKandis\AccuMailEntities\Collections\EMailEntityCollectionInterface;
use CodeKandis\AccuMailEntities\EMailEntityInterface;
use CodeKandis\AccuMailEntities\JobEntityInterface;
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
 * Represents the MariaDB repository of the e-mail entity.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class EMailEntityRepository extends AbstractRepository implements EMailEntityRepositoryInterface
{
	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The e-mail entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readEMails(): EMailEntityCollectionInterface
	{
		$query = <<< END
			SELECT
				`eMails`.*
			FROM
				`eMails`
			ORDER BY
				`eMails`.`_id` ASC;
		END;

		$eMailEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildEMailEntityPropertyMapper();

		return new EMailEntityCollection(
			...$this->databaseConnector->query( $query, null, $eMailEntityPropertyMapper )
		);
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The e-mail entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readEMailByRecordId( PersistableEMailEntityInterface $eMail ): ?EMailEntityInterface
	{
		$query = <<< END
			SELECT
				`eMails`.*
			FROM
				`eMails`
			WHERE
				`eMails`.`_id` = :_id
			LIMIT
				0, 1;
		END;

		$persistableEMailEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildPersistableEMailEntityPropertyMapper();
		$eMailEntityPropertyMapper            = ( new EntityPropertyMapperBuilder() )
			->buildEMailEntityPropertyMapper();

		$mappedPersistableEMail = $persistableEMailEntityPropertyMapper->mapToArray( $eMail );

		$arguments = [
			'_id' => $mappedPersistableEMail[ '_id' ]
		];

		return $this->databaseConnector->queryFirst( $query, $arguments, $eMailEntityPropertyMapper );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The e-mail entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readEMailById( EMailEntityInterface $eMail ): ?EMailEntityInterface
	{
		$query = <<< END
			SELECT
				`eMails`.*
			FROM
				`eMails`
			WHERE
				`eMails`.`id` = :id
			LIMIT
				0, 1;
		END;

		$eMailEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildEMailEntityPropertyMapper();

		$mappedEMail = $eMailEntityPropertyMapper->mapToArray( $eMail );

		$arguments = [
			'id' => $mappedEMail[ 'id' ]
		];

		return $this->databaseConnector->queryFirst( $query, $arguments, $eMailEntityPropertyMapper );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The job entity class to reflect does not exist.
	 * @throws ReflectionException The e-mail entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode of the statement failed.
	 * @throws FetchingResultFailedException The fetching of the statment result failed.
	 */
	public function readEMailByJobId( JobEntityInterface $job ): ?EMailEntityInterface
	{
		$query = <<< END
			SELECT
				`eMails`.*
			FROM
				`eMails`
			WHERE
				`eMails`.`jobid` = :jobId
			LIMIT
				0, 1;
		END;

		$jobEntityPropertyMapper   = ( new EntityPropertyMapperBuilder() )
			->buildJobEntityPropertyMapper();
		$eMailEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildEMailEntityPropertyMapper();

		$mappedJob = $jobEntityPropertyMapper->mapToArray( $job );

		$arguments = [
			'jobId' => $mappedJob[ 'id' ]
		];

		return $this->databaseConnector->queryFirst( $query, $arguments, $eMailEntityPropertyMapper );
	}

	/**
	 * {@inheritDoc}
	 * @throws ReflectionException The e-mail entity class to reflect does not exist.
	 * @throws ReflectionException The job entity class to reflect does not exist.
	 * @throws TransactionStartFailedException The transaction failed to start.
	 * @throws TransactionRollbackFailedException The transaction failed to roll back.
	 * @throws TransactionCommitFailedException The transaction failed to commit.
	 * @throws InvalidArgumentsStatementsCountException The number of argument lists does not match the number of statements.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 */
	public function createEMailByJobId( EMailEntityInterface $eMail, JobEntityInterface $job ): PersistableEMailEntityInterface
	{
		$query = <<< END
			INSERT INTO
				`eMails`
				( `id`, `jobId`, `subject`, `isHtmlBody`, `body`, `alternativeBody` )
			VALUES
				( UUID( ), :jobId, :subject, :isHtmlBody, :body, :alternativeBody );
		END;

		$eMailEntityPropertyMapper            = ( new EntityPropertyMapperBuilder() )
			->buildEMailEntityPropertyMapper();
		$jobEntityPropertyMapper              = ( new EntityPropertyMapperBuilder() )
			->buildJobEntityPropertyMapper();
		$persistableEMailEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildPersistableEMailEntityPropertyMapper();

		$mappedEMail = $eMailEntityPropertyMapper->mapToArray( $eMail );
		$mappedJob   = $jobEntityPropertyMapper->mapToArray( $job );

		$arguments = [
			'jobId'           => $mappedJob[ 'id' ],
			'subject'         => $mappedEMail[ 'subject' ],
			'isHtmlBody'      => $mappedEMail[ 'isHtmlBody' ],
			'body'            => $mappedEMail[ 'body' ],
			'alternativeBody' => $mappedEMail[ 'alternativeBody' ]
		];

		$this->databaseConnector->execute( $query, $arguments );

		return $persistableEMailEntityPropertyMapper->mapFromArray(
			[
				'_id' => $this->databaseConnector->getLastInsertId()
			]
		);
	}
}
