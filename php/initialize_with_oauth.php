<?php

require_once 'Mollie/API/Autoloader.php';

/*
 * Initialize the Mollie API library with OAuth.
 *
 * See: https://www.mollie.com/en/docs/oauth/overview
 */
$mollie = new Mollie_API_Client;
$mollie->setAccessToken("access_Wwvu7egPcJLLJ9Kb7J632x8wJ2zMeJ");
