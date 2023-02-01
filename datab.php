<?php
setlocale(LC_TIME, 'fr_FR.UTF-8','fra'); 
date_default_timezone_set('Europe/Paris');


class Database {

    // Database Properties.

    private $host = 'localhost';
    private $db_name = 'test';
    private $username = 'root';
    private $password = 'root';
    private $connection = null;

    // Function for making connection to database.

    public function connect()
    {
        try
        {
            $this->connection = new PDO('mysql:host='.$this->host.';dbname='.$this->db_name, 
                               $this->username,
                               $this->password,
        );
        $this->connection->exec("set names utf8");
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }

        return $this->connection;
    }

    
}

 /* utiliser pour appeller la bdd
 
 $database = new Database;
 $db =  $database->connect();
 
 */