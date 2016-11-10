<?php 

const DATA_BASE_DEFINITION = array(
	'users' => "CREATE TABLE `users` (
		`id` int(21) NOT NULL,
		`access_token` varchar(255) DEFAULT '',
		`refresh_token` varchar(255) DEFAULT '',
		`login_key` varchar(255) DEFAULT NULL,
		`last_login` int(11) DEFAULT NULL,
		PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;"
);