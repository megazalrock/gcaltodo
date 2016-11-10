<?php 

const DATA_BASE_DEFINITION = array(
	'users' => "CREATE TABLE `users` (
		`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		`email` varchar(256) NOT NULL DEFAULT '',
		`access_token` varchar(255) NOT NULL DEFAULT '',
		`refresh_token` varchar(255) NOT NULL DEFAULT '',
		PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;"
);