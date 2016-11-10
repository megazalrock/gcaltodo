<?php

require_once __DIR__ . "/../../vendor/autoload.php";
require_once __DIR__ . "./DataBase.php";

class GoogleAPI {

	private $access_token = null;
	private $refresh_token = null;


	function __construct(){
		$this->client = new Google_Client();
	}

	function get_code(){
		$this->client->setAuthConfig('../client_id.json');
		$this->client->addScope(Google_Service_Calendar::CALENDAR_READONLY);
		$this->client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php');
		$this->client->setAccessType('offline');
		$auth_url = $client->createAuthUrl();
		header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
	}

	function authenticate_by_code(){
		if(empty($_GET['code'])){
			exit;
		}
		$this->client->authenticate($_GET['code']);
		$this->access_token = $this->client->getAccessToken();
		$this->refresh_token =  $this->client->getRefreshToken();
		return $this;
	}

	function get_tokens(){
		return array(
			'access_token' => $this->access_token,
			'refresh_token' => $this->refresh_token
		);
	}

	function get_user_id(){
		$ticket = $this->client->verifyIdToken($this->access_token);
		if($ticket){
			$data = $ticket->getAttribute();
			var_dump($ticket);
		}
		return $this;
	}


	function set_settion(){
	}
}