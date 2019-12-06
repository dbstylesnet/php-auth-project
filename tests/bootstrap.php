<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

error_reporting(E_ALL | E_STRICT);

require __DIR__ . '/../vendor/autoload.php';

define('TEMPLATE_DIR', __DIR__ . '/../www/templates');
