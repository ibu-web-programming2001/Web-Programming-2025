<?php
require_once 'BaseDao.php';

class RestaurantDao extends BaseDao {
    public function __construct(){
        parent::__construct("restaurants"); 
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
