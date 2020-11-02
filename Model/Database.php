<?php

require '../config.php';

class Database
{

    public function openConnection($dbHost, $dbUser, $dbPass, $db): PDO {

        $driverOptions = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        return new PDO( 'mysql:host='. $dbHost . ';dbname='. $db, $dbUser, $dbPass, $driverOptions);
    }
}