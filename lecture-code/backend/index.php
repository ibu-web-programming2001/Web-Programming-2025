<?php
require "./vendor/autoload.php";
require "rest/services/StudentServicev3.php";
require "rest/services/ProfessorServicev1.php";

Flight::register('student_service', "StudentServicev3");
Flight::register('professor_service', "ProfessorServicev1");

require_once 'rest/routes/StudentRoutes.php';
require_once 'rest/routes/ProfessorRoutes.php';

Flight::start();
