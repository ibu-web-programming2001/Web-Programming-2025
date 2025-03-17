<?php
require_once __DIR__ . '/ProfessorDaov4.php';
require_once __DIR__ . '/StudentDaov4.php';

$professor_dao = new ProfessorDaov4();
$professors = $professor_dao->get_all();
print_r($professors);
$professor = $professor_dao->get_by_id(1);
print_r($professor);
$professor_dao->add(["name" => "James888", "department" => "IT"]);
$professor_dao->update(["name" => "JamesUPD", "department" => "IT22"], 13);
$professor_dao->delete(13);
print_r($professor_dao->get_all());


$student_dao = new StudentDaov4();
$students = $student_dao->get_all();
print_r($students);
$student = $student_dao->get_by_id(1);
print_r($student);
$student_dao->add(["name" => "James", "email" => "james@gmail.com"]);
$student_dao->update(["name" => "James", "email" => "jamesupdate@gmail.com"], 3);
$student_dao->delete(3);
print_r($student_dao->get_all());