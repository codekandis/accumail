<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Configurations\Plain;

use CodeKandis\Persistence\PersistenceDrivers;

return [
	'driver'       => PersistenceDrivers::MYSQL,
	'host'         => 'localhost',
	'databaseName' => 'accumail.codekandis',
	'username'     => 'root',
	'passphrase'   => 'root',
];
