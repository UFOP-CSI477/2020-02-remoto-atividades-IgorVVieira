<?php

namespace App\Database;

class AdapterSQLite implements AdapteterInterface
{
    public function open()
    {
        $dbFile = './database.sqlite';
        $strConnection = 'sqlite:' . $dbFile;
        $connection = new \PDO($strConnection);

        return $connection;
    }

    public function close()
    {
    }

    public function get()
    {
    }
}
