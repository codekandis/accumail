<?php declare( strict_types = 1 );
namespace CodeKandis\AccuMail\Configurations\Plain;

use CodeKandis\AccuMail\Api\Actions as Api;
use CodeKandis\Tiphy\Http\Requests\Methods;

return [
	'baseRoute' => '',
	'routes'    => [
		'^/$'                   => [
			Methods::GET => Api\Get\IndexAction::class
		],
		'^/jobs'                => [
			Methods::GET => Api\Get\JobsAction::class,
			Methods::PUT => Api\Put\CreateJobAction::class
		],
		'^/jobs-created'        => [
			Methods::GET => Api\Get\JobsCreatedAction::class,
		],
		'^/jobs-sent-succeeded' => [
			Methods::GET => Api\Get\JobsSentSucceededAction::class,
		],
		'^/jobs-sent-failed'    => [
			Methods::GET => Api\Get\JobsSentFailedAction::class,
		]
	]
];
