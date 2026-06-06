<?php

class database{

    private string $host = "localhost";
    private string $dbname = "citywatch";
    private string $username = "root";
    private string $password = "";

    private ?PDO $connection = NULL;

    public function __construct()
    {
        $this->connect();
    }

    private function connect():void{

        try{

            $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8";

            $this->connection = new PDO(

                $dsn,
                $this->username,
                $this->password

            );

            $this->connection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            $this->connection->setAttribute(
                PDO::ATTR_DEFAULT_FETCH_MODE,
                PDO::FETCH_ASSOC
            );





        }catch(PDOException $e){

        die("Erreur de connexion : {$e->getMessage()}");

        }

    }

    public function getConnection():PDO {
        return $this->connection;
    }



}



