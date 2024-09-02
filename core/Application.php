<?php

namespace Core;

use Core\database\DatabaseFactory;
use Core\database\DatabaseInterface;

class Application
{
    private DatabaseInterface $database;

    public function __construct()
    {
        $this->database = DatabaseFactory::createDatabase('sqlite');
    }

    public function run(): void
    {
        $this->database->connect();
        // ...
        $this->database->disconnect();
    }
}