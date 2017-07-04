<?php

use Guzzle\Http\Client;

$headers = [
    'Authorization' => 'Bearer vr5HmMkzlxKE70W1y4MibiJUusZwZC25NOVBEx3BD1',
    'Content-Type' => 'application/json',
];

$payload = ['user_id' => 2];

$client = new Client('http://api.example.com');
$request = $client->post('/moments/1/gift', $headers, json_encode($payload));
