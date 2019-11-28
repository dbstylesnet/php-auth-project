<?php

use App\Core\Db\ConnectionFactory;
use App\Authentication\Repository\UserRepository;
use App\Authentication\User;

require_once __DIR__ . '/../vendor/autoload.php';

define('TEMPLATE_DIR', __DIR__ . '/templates');

$connectionFactory = new ConnectionFactory("mysql", "app", "app", "app");