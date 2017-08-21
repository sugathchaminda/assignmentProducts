<?php

namespace App\Models;

use App\Core\DbConnection;

class LoginUser
{
    private $conn;
    private $table_name = "tbl_user";

    // object properties
    public $user_id;
    public $group_id;
    public $user_name;
    public $password;
    public $region_id;

    /**
     * LoginUser constructor.
     */
    public function __construct()
    {
        $this->conn = new DbConnection();
    }

    /**
     * @return mixed
     */
    public function login()
    {
        $query = "SELECT user_id, group_id FROM " . $this->table_name.  " WHERE user_name = :username AND password = :password" ;

        $stmt = $this->conn->getConnection()->prepare($query);

        $stmt->bindParam(':username', $this->user_name);
        $stmt->bindParam(':password', $this->password);
        $stmt->execute();

        return $stmt->fetch();
    }
}