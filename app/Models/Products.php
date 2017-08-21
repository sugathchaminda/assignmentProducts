<?php

namespace App\Models;

use App\Core\DbConnection;

class Products
{
    private $conn;
    private $table_name = "tbl_products";

    // object properties
    public $id;
    public $code;
    public $name;
    public $price;
    public $region_id;

    public function __construct(){
        $this->conn = new DbConnection();
    }

    public function viewProducts()
    {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY name ASC";

        $stmt = $this->conn->getConnection()->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function viewProductsRegion()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE ";

        $stmt = $this->conn->getConnection()->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function deleteProducts()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        $stmt = $this->conn->getConnection()->prepare($query);
        $stmt->bindParam(1, $this->id);

        if($result = $stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function createProducts()
    {
        $query = "INSERT INTO  " . $this->table_name . " SET
                    code=:code, name=:name,price=:price,region_id=:region_id";

        $stmt = $this->conn->getConnection()->prepare($query);

        $stmt->bindParam(":code", $this->code);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":region_id", $this->region_id);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function updateProducts()
    {
        $query = "UPDATE " . $this->table_name . "
            SET
                code = :code,
                name = :name,
                price = :price,
                region_id = :region_id
            WHERE
                id = :id";

        $stmt = $this->conn->getConnection()->prepare($query);

        // posted values
        $this->code=htmlspecialchars(strip_tags($this->code));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->price=htmlspecialchars(strip_tags($this->price));
        $this->region_id=htmlspecialchars(strip_tags($this->region_id));
        $this->id=htmlspecialchars(strip_tags($this->id));

        // bind parameters
        $stmt->bindParam(':code', $this->code);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':region_id', $this->region_id);
        $stmt->bindParam(':id', $this->id);

        // execute the query
        if($stmt->execute()){
            return true;
        }

        return false;
    }
}