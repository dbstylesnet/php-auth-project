<?php

use App\Core\Db\DbConnection;

require_once __DIR__ . '/../vendor/autoload.php';

define('TEMPLATE_DIR', __DIR__ . '/templates');

//$link = mysqli_connect("mysql", "app", "app", "app");
// $connectionFactory = new ConnectionFactory(configuration this is -> []

$connectionFactory = new DbConnection("mysql", "app", "app", "app");


// class ConnectionFactory {

    // private $conenction;
    // constructor ($dbConfiguration);

    //getConenction()
    //{
            // singleton pattern
            //
    //}

// }