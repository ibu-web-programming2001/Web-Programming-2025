<?php
require_once 'BaseService.php';
require_once __DIR__ . "/../dao/StudentDaov4.php";

class StudentServicev3 extends BaseService
{
    public function __construct()
    {
        parent::__construct(new StudentDaov4);
    }
}
