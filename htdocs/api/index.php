<?php

require_once __DIR__ . '/../../vendor/autoload.php';

$app = new Bullet\App();
$app->path('api', function($resquest) use ($app){
	//echo 'hello';
	$app->path('users', function($requestst) use($app){
		$app->param('slug', function($requestst, $id) use ($app){
			$app->get(function($requestst) use ($id){
				
				
			});
			$app->put(function($requestst) use ($id){
				


			});
		});
		return 404;
	});

});

echo $app->run('PUT', '/api/' . $_GET['u']);