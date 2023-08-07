<?php

require (__DIR__).'/vendor/autoload.php';

use GuzzleHttp\Client;
use src\Application\Commands\UserId;

// Create a new Guzzle HTTP client
$client = new Client([
    // Set the base URL of the server
    'base_uri' => 'https://stats.dev.chip.test/'
]);

// Specify the UUID of the user
$userId = '88224979-406e-4e32-9458-55836e4e1f95';

try {
    // Make a GET request to the /users/{userId} endpoint
    $response = $client->request('GET', 'users/' . $userId);

    // Get the response body as a string
    $body = $response->getBody()->getContents();

    // Parse the JSON response into an associative array
    $data = json_decode($body, true);

    // Print the response data
    print_r($data);
} catch (Exception $e) {
    // Handle any exceptions or errors that occurred during the request
    echo 'Error: ' . $e->getMessage();
}
