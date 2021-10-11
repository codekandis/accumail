<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\Persistence\MariaDb\Repositories;

use CodeKandis\AccuMail\Environment\Entities\Collections\EMailEntityCollection;
use CodeKandis\AccuMail\Environment\Entities\Collections\EMailEntityCollectionInterface;
use CodeKandis\AccuMail\Environment\Entities\EMailEntity;
use CodeKandis\AccuMail\Environment\Entities\EMailEntityInterface;
use CodeKandis\AccuMail\Environment\Entities\EntityPropertyMappings\EntityPropertyMapperBuilder;
use CodeKandis\AccuMail\Environment\Entities\JobEntityInterface;
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
	public function readEMailByRecordId( EMailEntityInterface $eMail ): ?EMailEntityInterface
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

		$eMailEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildEMailEntityPropertyMapper();
		$mappedEMail               = $eMailEntityPropertyMapper->mapToArray( $eMail );
		$arguments                 = [
			'_id' => $mappedEMail[ '_id' ]
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
		$mappedEMail               = $eMailEntityPropertyMapper->mapToArray( $eMail );
		$arguments                 = [
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
		$mappedJob                 = $jobEntityPropertyMapper->mapToArray( $job );
		$arguments                 = [
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
	public function createEMailByJobId( EMailEntityInterface $eMail, JobEntityInterface $job ): EMailEntityInterface
	{
		$query = <<< END
			INSERT INTO
				`eMails`
				( `id`, `jobId`, `subject`, `plainTextBody`, `htmlBody` )
			VALUES
				( UUID( ), :jobId, :subject, :plainTextBody, :htmlBody );
		END;

		$eMailEntityPropertyMapper = ( new EntityPropertyMapperBuilder() )
			->buildEMailEntityPropertyMapper();
		$mappedEMail               = $eMailEntityPropertyMapper->mapToArray( $eMail );
		$jobEntityPropertyMapper   = ( new EntityPropertyMapperBuilder() )
			->buildJobEntityPropertyMapper();
		$mappedJob                 = $jobEntityPropertyMapper->mapToArray( $job );
		$arguments                 = [
			'jobId'         => $mappedJob[ 'id' ],
			'subject'       => $mappedEMail[ 'subject' ],
			'plainTextBody' => $mappedEMail[ 'plainTextBody' ],
			'htmlBody'      => $mappedEMail[ 'htmlBody' ]
		];

		$this->databaseConnector->execute( $query, $arguments );

		return EMailEntity::fromArray(
			[
				'_id' => $this->databaseConnector->getLastInsertId()
			]
		);
	}
}
