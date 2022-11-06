<?php

namespace App\Models;

use PDO;

class DatabaseHandler
{
    protected $pdo;

    protected $host = '127.0.0.1';
    protected $charset = 'utf8';

    public function __construct(EnvironmentProvider $envProvider)
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $envProvider->getDatabaseName() . ';charset=' .
            $this->charset;
        $opt = [
            PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES      => false,
        ];

        $this->pdo = new PDO($dsn, $envProvider->getUser(), $envProvider->getPassword(), $opt);
    }

    public function getPDO()
    {
        return $this->pdo;
    }
}
