<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;

$code = $_GET['code'];
$clientId = '86q8qy4e9z8d9f';
$clientSecret = 'VNbOSTNSOzsxSsxg';
$redirectUri = 'http://localhost:3000';
$accessTokenURL = 'https://www.linkedin.com/oauth/v2/accessToken';
$linkedInApiUrl = 'https://api.linkedin.com/v2';

$httpClient = new Client();

// Get access token
$accessTokenResponse = $httpClient->post($accessTokenURL, [
    'form_params' => [
        'grant_type' => 'authorization_code',
        'code' => $code,
        'redirect_uri' => $redirectUri,
        'client_id' => $clientId,
        'client_secret' => $clientSecret,
    ],
]);

$accessTokenData = json_decode($accessTokenResponse->getBody(), true);

// Get user profile
$profileResponse = $httpClient->get($linkedInApiUrl . '/me', [
    'headers' => [
        'Authorization' => 'Bearer ' . $accessTokenData['access_token'],
    ],
]);

$profileData = json_decode($profileResponse->getBody(), true);

// Display the user profile
print_r($profileData);