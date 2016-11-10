<?php

require_once __DIR__ . '/../app/Class/GoogleApi.php';
require_once __DIR__ . '/../app/Class/Users.php';

$api = new GoogleAPI();
$api->authenticate_by_code()
	->get_user_id();
