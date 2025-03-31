<?php
require_once 'BaseService.php';
require_once __DIR__ . "/../dao/ProfessorDaov4.php";

class ProfessorServicev1 extends BaseService
{
    public function __construct()
    {
        parent::__construct(new ProfessorDaov4);
    }
}
