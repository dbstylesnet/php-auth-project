<?php

namespace App\Core\Db;

use \Doctrine\DBAL\Configuration;
use \Doctrine\DBAL\DriverManager;
use \Doctrine\DBAL\Connection;

class ConnectionFactory
{
    private $host;

    private $user;
    
    private $password;
    
    private $dbname;

    private $connection;

    public function __construct(
        string $host,
        string $user,
        string $password,
        string $dbname
    ) {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    /**
     * 
     */
    public function getConnection(): Connection
    {
        if ($this->connection === null) {
            $config = new Configuration();

            // config->setLoggert
            $connectionParams = [
              'dbname' => $this->dbname,
              'user' => $this->user,
              'password' => $this->password,
              'host' => $this->host,
              'driver' => 'mysqli',
            ];

            $this->connection = DriverManager::getConnection($connectionParams, $config);
        }

        return $this->connection;
    }
}
