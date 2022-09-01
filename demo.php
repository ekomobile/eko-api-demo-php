#!/usr/bin/env php
<?php

use ekomobile\apiEko\BillingClient;
use ekomobile\apiEko\ServiceCategory;
use ekomobile\apiEko\ServiceCategoryRequest;
use ekomobile\apiEko\ServiceCategoryResponse;
use Grpc\ChannelCredentials;

require(__DIR__ . '/vendor/autoload.php');

// Configure SSL credentials
$cert = file_get_contents($_ENV['EKO_API_CLIENT_CERT']);
$credentials = ChannelCredentials::createSsl(null, $cert, $cert);

// Create gRPC client
$client = new BillingClient($_ENV['EKO_API_ADDRESS'], ['credentials' => $credentials]);

// Form gRPC request
$request = new ServiceCategoryRequest();

// Make request and wait for response
/** @var ServiceCategoryResponse $response */
[$response, $status] = $client->ServiceCategory($request)->wait();

// Check response status
if ($status->code !== \Grpc\STATUS_OK) {
    throw new \Exception($status->details);
}

// Output results
/** @var ServiceCategory $category */
foreach ($response->getCategories() as $category) {
    print_r("{$category->getId()} : {$category->getName()} \n");
}
