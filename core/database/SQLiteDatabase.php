<?php

namespace Core\database;

use PDO;
use PDOException;

class SQLiteDatabase implements DatabaseInterface
{
    private static ?DatabaseInterface $instance = null;
    private ?PDO $database = null;
    private string $databasePath;

    public static function getInstance(string $databasePath = __DIR__ . '/../../app/database.sqlite'): SQLiteDatabase
    {
        if (is_null(self::$instance)) {
            self::$instance = new self($databasePath);
        }
        return self::$instance;
    }

    private function __construct(string $databasePath) {
        $this->databasePath = $databasePath;
    }
    private function __clone() {}
    public function __wakeup() {}

    public function connect(): void
    {
        try {
            $this->database = new PDO('sqlite:' . $this->databasePath);
            $this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new DatabaseException("Ошибка подключения к базе данных SQLite: " . $e->getMessage());
        }
    }

    public function disconnect(): void
    {
        $this->database = null;
    }
}