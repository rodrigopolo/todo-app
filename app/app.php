<?php

// Set Time zone
date_default_timezone_set("UTC");

// SlimPHP portable route fix
$_SERVER['SCRIPT_NAME'] = preg_replace('/public\\/index\\.php$/', 'index.php', $_SERVER['SCRIPT_NAME'], 1);


// Load Config
require 'app/config.php';

// Autoload
require 'vendor/autoload.php';

// RedBeanPHP alias fix
class R extends RedBeanPHP\Facade {}

// RedBeanPHP setup
R::setup('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USERNAME, DB_PASSWORD);
R::freeze(DB_FREEZE);

// Slim app instance
$app = new \Slim\Slim([
	'view' => new EnhancedView()
]);

// Slim Config
$app->config([
	'templates.path' => 'app/views',
	'debug' => APP_DEBUG
]);

// Add support for JSON posts
$app->add(new \Slim\Middleware\ContentTypes());

// JSON view function
function APIrequest(){
	$app = \Slim\Slim::getInstance();
	$app->view(new \JsonView());
	$app->view->clear();
}

// Set webroot for portable
$app->hook('slim.before', function () use ($app) {
	$app->wroot = $app->request->getUrl().$app->request->getRootUri();
	$app->view()->appendData(['wroot' => $app->wroot]);
});

// Load routes
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(dirname(__FILE__).'/routes/'));
foreach ($iterator as $file) {
	$fname = $file->getFilename();
	if (preg_match('%\.php$%', $fname)) {
		require $file->getPathname();
	}
}

// Errors
require 'sys/errors.php';

$app->run();
