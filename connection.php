<?php

class Dbconnection
{
    private  $host = 'localhost'; //HOST NAME.
    private $db_name = 'php'; //Database Name
    private $db_username = 'root'; //Database Username
    private  $db_password = ''; //Database Password

    public $pdo;

    public function __construct()
    {
        if (!isset($this->pdo)) {
            $this->pdo = new PDO('mysql:host=' . $this->host . ';dbname='. $this->db_name, $this->db_username, $this->db_password);

                if(!$this->pdo){
                    echo"connection not established!!";
                    exit;
                }
        }

        return $this->pdo;
    }
}

