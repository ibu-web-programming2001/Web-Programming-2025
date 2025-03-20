<?php
require_once 'BaseDao.php';

class ReservationDao extends BaseDao {
    public function __construct() {
        parent::__construct("reservations");
    }
}
?>