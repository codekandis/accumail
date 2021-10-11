<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Environment\EMails;

use CodeKandis\AccuMail\Environment\Entities\Enumerations\EncryptionTypes;
use CodeKandis\AccuMail\Environment\Entities\Enumerations\PhpMailerEncryptionTypes;
use CodeKandis\AccuMail\Environment\Entities\JobEntityInterface;
use CodeKandis\ConstantsClassesTranslator\ConstantsClassesTranslator;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use function base64_decode;

/**
 * Represents a mailer.
 * @package codekandis/accumail
 * @author Christian Ramelow <info@codekandis.net>
 */
class Mailer implements MailerInterface
{
	/**
	 * Stores the job to process.
	 * @var JobEntityInterface
	 */
	private JobEntityInterface $job;

	/**
	 * Constructor method.
	 * @param JobEntityInterface $job The job to process.
	 */
	public function __construct( JobEntityInterface $job )
	{
		$this->job = $job;
	}

	/**
	 * {@inheritDoc}
	 * @throws Exception An error occured during processing the job.
	 */
	public function process(): void
	{
		$phpMailer = new PHPMailer( true );
		$phpMailer->isSMTP();

		$phpMailer->Host       = $this->job->getServerConnection()->getHost();
		$phpMailer->Port       = $this->job->getServerConnection()->getPort();
		$phpMailer->SMTPSecure = ( new ConstantsClassesTranslator( EncryptionTypes::class, PhpMailerEncryptionTypes::class ) )
			->translate(
				$this
					->job
					->getServerConnection()
					->getEncryptionType()
			);
		$phpMailer->SMTPAuth   = true;
		$phpMailer->Username   = $this->job->getServerConnection()->getAuthenticationCredential()->getUsername();
		$phpMailer->Password   = $this->job->getServerConnection()->getAuthenticationCredential()->getPassword();

		$phpMailer->From     = $this->job->getEMail()->getFromAddress()->getAddress();
		$phpMailer->FromName = $this->job->getEMail()->getFromAddress()->getName();

		foreach ( $this->job->getEMail()->getToAddresses() as $toAddress )
		{
			$phpMailer->addAddress(
				$toAddress->getAddress(),
				$toAddress->getName()
			);
		}
		foreach ( $this->job->getEMail()->getCcAddresses() as $ccAddress )
		{
			$phpMailer->addCC(
				$ccAddress->getAddress(),
				$ccAddress->getName()
			);
		}
		foreach ( $this->job->getEMail()->getBccAddresses() as $bccAddress )
		{
			$phpMailer->addBCC(
				$bccAddress->getAddress(),
				$bccAddress->getName()
			);
		}

		foreach ( $this->job->getEMail()->getAttachments() as $attachment )
		{
			$phpMailer->addStringAttachment(
				base64_decode(
					$attachment->getContent()
				),
				$attachment->getName()
			);
		}

		$phpMailer->Subject = $this->job->getEMail()->getSubject();

		if ( '' !== $this->job->getEMail()->getHtmlBody() )
		{
			$phpMailer->Body = $this->job->getEMail()->getHtmlBody();
		}
		if ( '' !== $this->job->getEMail()->getPlainTextBody() )
		{
			$phpMailer->AltBody = $this->job->getEMail()->getPlainTextBody();
		}

		$phpMailer->send();
	}
}
