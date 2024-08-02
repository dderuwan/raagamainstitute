<?php

require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory)
    ->withServiceAccount('RaagamaInstitute-firebase-adminsdk-ggxq5-0f3fc5d591.json')
    ->withDatabaseUri('https://RaagamaInstitute-default-rtdb.firebaseio.com');

$database = $factory->createDatabase();
?>