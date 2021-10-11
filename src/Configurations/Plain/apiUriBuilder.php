<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Configurations\Plain;

return [
	'schema'       => 'http',
	'host'         => 'api.accumail.codekandis',
	'baseUri'      => '/',
	'relativeUris' => [
		'index'                                     => '',
		'users'                                     => 'users',
		'user'                                      => 'users/%s',
		'apiKeys'                                   => 'apiKeys',
		'apiKey'                                    => 'apiKeys/%s',
		'jobs'                                      => 'jobs',
		'job'                                       => 'jobs/%s',
		'jobsCreated'                               => 'jobs-created',
		'jobsSentSucceeded'                         => 'jobs-sent-succeeded',
		'jobsSentFailed'                            => 'jobs-sent-failed',
		'serverConnections'                         => 'server-connections',
		'serverConnection'                          => 'server-connections/%s',
		'serverConnectionAuthenticationCredentials' => 'server-connection-authentication-credentials',
		'serverConnectionAuthenticationCredential'  => 'server-connection-authentication-credentials/%s',
		'eMails'                                    => 'e-mails',
		'eMail'                                     => 'e-mails/%s',
		'eMailAddresses'                            => 'e-mail-addresses',
		'eMailAddress'                              => 'e-mail-addresses/%s',
		'eMailAttachments'                          => 'e-mail-attachments',
		'eMailAttachment'                           => 'e-mail-attachments/%s'
	]
];
