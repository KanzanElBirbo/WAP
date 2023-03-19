<?php
$idb = require 'IDB.php';

class MySQL implements IDB {

    public $host
    public $username
    public $password
    public $database

    public function connect(

        string $host = "",
        string $username = "",
        string $password = "",
        string $database = ""
    
    ): ?static;

    function select(string $query): array;

    function insert(string $table, array $data): bool;

    function update(string $table, int $id, array $data): bool;

    function delete(string $table, int $id): bool;
}