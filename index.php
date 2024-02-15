<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;

$linkedinAuthURL = 'https://www.linkedin.com/oauth/v2/authorization';
$clientId = '86q8qy4e9z8d9f';
$redirectUri = 'VNbOSTNSOzsxSsxg';
$scope = 'r_liteprofile r_emailaddress';

$linkedinAuthParams = [
    'response_type' => 'code',
    'client_id' => $clientId,
    'redirect_uri' => $redirectUri,
    'scope' => $scope,
];

$linkedinAuthUrl = $linkedinAuthURL . '?' . http_build_query($linkedinAuthParams);

// Display LinkedIn authentication link
echo '<a href="' . $linkedinAuthUrl . '">Login with LinkedIn</a>';