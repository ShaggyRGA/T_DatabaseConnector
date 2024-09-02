<?php

namespace Core\database;

interface DatabaseInterface
{
    public static function getInstance(): DatabaseInterface;
    public function connect(): void;
    public function disconnect(): void;
}