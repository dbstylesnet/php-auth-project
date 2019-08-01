<?php 

namespace App\Core\Db;

interface ConnectionInterface
{
    /**
     * Returns array of settings needed for database connection
     * @return array
     */
    public function getConnection(): array;
}