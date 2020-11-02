<?php


class Database
{

    public function openConnection(): PDO {

        $dbHost = "localhost";
        $dbUser = "becode";
        $dbPass = "becode123";
        $db = "beCode class";

        $driverOptions = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        return new PDO( 'mysql:host='. $dbHost . ';dbname='. $db, $dbUser, $dbPass, $driverOptions);
    }
}