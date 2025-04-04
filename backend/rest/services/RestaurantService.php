<?php
require_once __DIR__ . '/../dao/RestaurantDao.php';

class RestaurantService {
    private $dao;

    public function __construct(){
        $this->dao = new RestaurantDao();
    }

    public function get_restaurant_by_id($id) {
        return $this->dao->get_by_id($id);
    }

    public function get_restaurants($location = null) {
        if ($location) {
            return $this->dao->get_by_location($location);
        } else {
            return $this->dao->get_all();
        }
    }

    public function add_restaurant($data) {
        return $this->dao->add($data);
    }

    public function update_restaurant($id, $data) {
        return $this->dao->update($id, $data);
    }

    public function partial_update_restaurant($id, $data) {
        return $this->dao->partial_update($id, $data);
    }

    public function delete_restaurant($id) {
        return $this->dao->delete($id);
    }
}
?>
