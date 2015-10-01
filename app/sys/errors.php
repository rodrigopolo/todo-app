<?php
$app->error(function (\Exception $e) use ($app){
	$app->render('sys/errors/unknown.php', 
		[
			'title' => 'Error',
			'e' => $e
		]
	);
});

// Load 404 Route
$app->notFound(function () use ($app) {
	$request = $app->request();
	$requesturi = $app->wroot.$app->request->getResourceUri();
	$app->render('sys/errors/404.php', 
		[
			'title' 		=> 'Error 404',
			'requesturi'	=>	$requesturi
		]
	);
});