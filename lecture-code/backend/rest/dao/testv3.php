<?php
require_once __DIR__ . '/ProfessorDaov3.php';
require_once __DIR__ . '/StudentDaov3.php';

$professor_dao = new ProfessorDaov3();
//$professors = $professor_dao->get_all();
//print_r($professors);

$professor = $professor_dao->get_by_id(5);
print_r($professor);
$professor_dao->update(5, "James", "ARC");
print_r($professor_dao->get_all());
/*
$professor_dao->add("James", "IT");
$professor_dao->update(5, "James", "ARC");
$professor_dao->delete(3);
print_r($professor_dao->get_all());


$student_dao = new StudentDaov3();
$students = $student_dao->get_all();
print_r($students);
$student = $student_dao->get_by_id(1);
print_r($student);
$student_dao->add("James", "IT");
$student_dao->update(3, "James", "GBE");
$student_dao->delete(3);
print_r($student_dao->get_all());
*/