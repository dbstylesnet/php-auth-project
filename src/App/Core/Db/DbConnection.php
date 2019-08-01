<?php

namespace App\Core\Db;

class DbConnection implements ConnectionInterface
{
    private $driver;

    private $user;
    
    private $password;
    
    private $dbname;

    private $connection;

    
    public function __construct(
        string $driver,
        string $user,
        string $password,
        string $dbname
    ) {
        $this->driver = $driver;
        $this->user = $user;
        $this->password = $password;
        $this->dbname = $dbname;
        $connection = array($driver, $user, $password, $dbname);
        $this->connection = $connection;
    }

    public function getConnection(): DbConnection //no args?
    {
        if (empty($this->connection)) {
            return new DbConnection(
                $this->driver,
                $this->user,
                $this->password,
                $this->dbname
            );
            
            // return new DbConnection(
            //     'mysql',
            //     'app',
            //     'app',
            //     'app'
            // );
        }
    }
}


// General singleton class.
// class Singleton {
//     // Hold the class instance.
//     private static $instance = null;
    
//     // The constructor is private
//     // to prevent initiation with outer code.
//     private function __construct()
//     {
//       // The expensive process (e.g.,db connection) goes here.
//     }
   
//     // The object is created from within the class itself
//     // only if the class has no instance.
//     public static function getInstance()
//     {
//       if (self::$instance == null)
//       {
//         self::$instance = new Singleton();
//       }
   
//       return self::$instance;
//     }
//   }
   
  