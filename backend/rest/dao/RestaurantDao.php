<?php
require_once 'BaseDao.php';

class RestaurantDao extends BaseDao {
    private $connection;
    private $table_name = "restaurants";
    public function __construct()
    {
        try {
            $host = 'localhost';
            $dbName = 'restoraount';
            $dbPort = 3306;
            $username = 'root';
            $password = '';

            $this->connection = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function get_by_id($id){
        return $this->getById($id);
    }

    public function get_all(){
        return $this->getAll();
    }

    public function get_by_location($location){
        $stmt = $this->connection->prepare("SELECT * FROM restaurants WHERE location = :location");
        $stmt->bindParam(':location', $location);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function add($restaurant){
        $this->insert($restaurant);
        return $restaurant;
    }


    public function partial_update($id, $restaurant){
        return $this->update($id, $restaurant);
    }

}
