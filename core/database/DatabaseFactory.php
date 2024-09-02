<?php

namespace Core\database;

class DatabaseFactory
{
    public static function createDatabase(string $databaseName): DatabaseInterface
    {
        if ($databaseName == 'sqlite') {
            return SQLiteDatabase::getInstance();
        } else {
            throw new Exception('База данных ' . $databaseName . ' не поддерживается');
        }
    }
}