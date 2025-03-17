<?php
require_once __DIR__ . '/ProfessorDaov2.php';
require_once __DIR__ . '/StudentDaov2.php';

$professor_dao = new ProfessorDaov2();
$professor_dao->delete(6);
$professors = $professor_dao->get_all();
print_r($professors);
$professor = $professor_dao->get_by_id(1);
print_r($professor);
$professor_dao->add("James", "IT");
$professor_dao->update(6, "James", "GBE");
$professor_dao->delete(6);
print_r($professor_dao->get_all());


$student_dao = new StudentDaov2();
$students = $student_dao->get_all();
print_r($students);
$student = $student_dao->get_by_id(1);
print_r($student);
$student_dao->add("James", "IT");
$student_dao->update(3, "James", "GBE");
$student_dao->delete(3);
print_r($student_dao->get_all());
