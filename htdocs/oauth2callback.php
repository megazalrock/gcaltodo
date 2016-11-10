<?php

require_once __DIR__ . '/../app/Class/GoogleAPI.php';
require_once __DIR__ . '/../app/Class/User.php';

$api = new GoogleAPI();
$api->authenticate_by_code();
$api->get_user_id();
