<?php

require_once 'Mollie/API/Autoloader.php';

/*
 * Initialize the Mollie API library with your API key.
 *
 * See: https://www.mollie.com/beheer/account/profielen/
 */
$mollie = new Mollie_API_Client;
$mollie->setApiKey("test_gEQ7KgFBcbJPtagxkC2PqjG6JjaNN2");
