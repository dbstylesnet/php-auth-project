<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

error_reporting(E_ALL | E_STRICT);

require __DIR__ . '/../vendor/autoload.php';

// or if you prefer yaml or XML
//$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
//$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

// $paths = array();
// // database configuration parameters
// $conn = array(
//     'driver' => 'pdo_sqlite',
//     'path' => __DIR__ . '/db.sqlite',
// );

// // obtaining the entity manager
// $entityManager = EntityManager::create($conn, $config);