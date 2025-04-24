<?php
require_once 'BaseDao.php';

class ReservationDao extends BaseDao {
    protected $table_name;

    public function __construct()
    {
        $this->table_name = "reservations";
        parent::__construct($this->table_name);
    }
}
?>