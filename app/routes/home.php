<?php
$app->get('/', function () use ($app){
	//throw new Exception('A error test.');
	$app->render('home.php');
});
