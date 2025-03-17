<?php


require_once __DIR__ . '/ProfessorDaov1.php';
require_once __DIR__ . '/StudentDaov1.php';

$professor_dao = new ProfessorDaov1();
$professors = $professor_dao->get_all();
print_r($professors);

$professor = $professor_dao->get_by_id(1);
print_r($professor);
$professor_dao->add("James", "IT");
$professor_dao->update(4, "James", "GBE");
print_r($professor_dao->get_all());
$professor_dao->delete(4);
print_r($professor_dao->get_all());

$student_dao = new StudentDaov1();
$students = $student_dao->get_all();
print_r($students);
$student = $student_dao->get_by_id(1);
print_r($student);
$student_dao->add("James", "james@gmail.com");
$student_dao->update(3, "James", "james2@gmail.com");
print_r($student_dao->get_all());