<?php

require_once __DIR__ . "/../vendor/autoload.php";

class User {
	function __construct(){

	}

	function login(){

		$client = new Google_Client();
		$client->setAuthConfig('../client_id.json');
		$client->addScope(Google_Service_Calendar::CALENDAR_READONLY);
		$client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php');
		$client->setAccessType('offline');

		$auth_url = $client->createAuthUrl();
		header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));


		//var_dump(Google_Service_Calendar::CALENDAR_READONLY);

		/*$client_id = json_decode(file_get_contents('../client_id.json'), true);
		$client_id = $client_id['web'];
		$provider = new League\OAuth2\Client\Provider\Google([
			'clientId'     => $client_id['client_id'],
			'clientSecret' => $client_id['client_secret'],
			'redirectUri'  => 'http://gcaltodo.otto/test.php',
			'hostedDomain' => 'http://gcaltodo.otto',
		]);

		if (!empty($_GET['error'])) {

			// Got an error, probably user denied access
			exit('Got error: ' . htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8'));

		} elseif (empty($_GET['code'])) {

			// If we don't have an authorization code then get one
			$authUrl = $provider->getAuthorizationUrl();
			$_SESSION['oauth2state'] = $provider->getState();
			header('Location: ' . $authUrl);
			exit;

		} elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {

			// State is invalid, possible CSRF attack in progress
			unset($_SESSION['oauth2state']);
			exit('Invalid state');

		} else {

			// Try to get an access token (using the authorization code grant)
			$token = $provider->getAccessToken('authorization_code', [
				'code' => $_GET['code']
			]);

			// Optional: Now you have a token you can look up a users profile data
			try {

				// We got an access token, let's now get the owner details
				$ownerDetails = $provider->getResourceOwner($token);

				// Use these details to create a new profile
				printf('Hello %s!', $ownerDetails->getFirstName());

			} catch (Exception $e) {

				// Failed to get user details
				exit('Something went wrong: ' . $e->getMessage());

			}

			// Use this to interact with an API on the users behalf
			echo $token->getToken();

			// Use this to get a new access token if the old one expires
			echo $token->getRefreshToken();

			// Number of seconds until the access token will expire, and need refreshing
			echo $token->getExpires();
		}*/

	}


}