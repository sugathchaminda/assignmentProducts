<?php
namespace App\Core;

class DbConnection
{

    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "assignment_sugath";
    private $username = "root";
    private $password = "root";
    public $conn;


    /**
     * @return \PDO
     */
    public function getConnection()
    {
        $this->conn = null;

        try{
            $this->conn = new \PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(\PDOException $exception){

            echo "Connection error: " . $exception->getMessage();
            exit;
        }

        return $this->conn;
    }
}