<?php

use Symfony\Component\HttpFoundation\Request;

if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}

// Par défaut on passe en production
if ( ! isset($_ENV['SYMFONY_ENV'])) {
	$_ENV['SYMFONY_ENV'] = 'prod';
}

require __DIR__.'/../app/autoload.php';
include_once __DIR__.'/../app/bootstrap.php.cache';

if ($_ENV['SYMFONY_ENV'] == 'dev') {
	\Symfony\Component\Debug\Debug::enable();
}

$kernel = new AppKernel($_ENV['SYMFONY_ENV'], $_ENV['SYMFONY_ENV'] == 'dev');
$kernel->loadClassCache();
//$kernel = new AppCache($kernel);

// When using the HttpCache, you need to call the method in your front controller instead of relying on the configuration parameter
//Request::enableHttpMethodParameterOverride();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
