<?php

$app->get('/todos', 'APIrequest', function () use ($app){

	$todos = R::findAll('todo');
	$app->render(200, ['todos'=>R::exportAll($todos)]);

});

$app->post('/todos/new', 'APIrequest', function () use ($app){

	$todo = R::dispense('todo');
	$todo->done = false;
	$todo->text = preg_replace('/<(:?script|style)\b[^>]*>(.*?)<\/(:?script|style)>/is', "$1", $app->request()->post('text'));
	R::store($todo);

	$app->render(200, ['todo'=>$todo->export()]);
});

$app->post('/todos/update/:id', 'APIrequest', function ($id) use ($app){

	$todo  = R::findOne('todo', ' id = ?', [$id]);

	if($todo){

		if($app->request()->post('text')){
			$todo->text = preg_replace('/<(:?script|style)\b[^>]*>(.*?)<\/(:?script|style)>/is', "$1", $app->request()->post('text'));
		}
		if($app->request()->post('done')){
			$todo->done = ($app->request()->post('done')=='true');
		}

		R::store($todo);

		$app->render(200, ['todo'=>$todo->export()]);

	}else{
		$app->render(404, ['error'=>'To-Do not found.']);
	}
});

$app->post('/todos/delete/:id', 'APIrequest', function ($id) use ($app){

	$todo  = R::findOne('todo', ' id = ?', [$id]);

	if($todo){
		R::trash($todo);
		$app->render(200, ['deleted'=>true]);
	}else{
		$app->render(404, ['error'=>'To-Do not found.']);
	}
});