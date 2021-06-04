<?php

require 'PayPal-PHP-SDK/autoload.php';


define('URL_SITIO', 'http://localhost:8080/gdlwebcamp');

$apiContext = new \PayPal\Rest\ApiContext(
	new \PayPal\Auth\OAuthTokenCredential(
		'AZH8BwPktMUNdIG7B6NWqsHbiunyk3njF805GEyayhi_js1VqvdT6NIDBhScF1d1R_ouecagk6q2QxHx', //ClientId
		'EIfRRxl2sbsYhqehDeIbNBc7_KumLpG6ORjnOfbfvccFc7I9zLugoYJ30ip4hovR98YQozzVDQH78oI8' //Secret
	)
);

?>
