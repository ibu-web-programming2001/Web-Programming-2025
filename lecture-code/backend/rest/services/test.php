<?php
require_once __DIR__ . './ProfessorService1.php';
require_once __DIR__ . './StudentServicev1.php';
require_once __DIR__ . './StudentServicev2.php';
require_once __DIR__ . './StudentServicev3.php';

$professor_service = new ProfessorService1();
$professors = $professor_service->get_all();
print_r($professors);

/*
$professor = $professor_service->get_by_id(1);
print_r($professor);
$professor_service->add(["name" => "James", "department" => "IT"]);
$professor_service->update(["id" => 3, "name" => "James", "email" => "james@gmail.com"], 3);
$professor_service->delete(3);
print_r($professor_service->get_all());

$student_service1 = new StudentServicev1();
$students = $student_service1->get_all();
print_r($students);
$student = $student_service1->get_by_id(1);
print_r($student);
$student_service1->add("James", "IT");
$student_service1->update_student(["id" => 3, "name" => "James", "email" => "james@gmail.com"]);
$student_service1->delete_student(3);
print_r($student_service1->get_all());

$student_service2 = new StudentServicev2();
$students = $student_service2->get_all();
print_r($students);
$student = $student_service2->get_by_id(1);
print_r($student);
$student_service2->add("James", "IT");
$student_service2->update_student(["id" => 3, "name" => "James", "email" => "james@gmail.com"]);
$student_service2->delete_student(3);
print_r($student_service2->get_all());

$student_service3 = new StudentServicev3();
$students = $student_service3->get_all();
print_r($students);
$student = $student_service3->get_by_id(1);
print_r($student);
$student_service3->add("James", "IT");
$student_service3->update(["id" => 3, "name" => "James", "email" => "james@gmail.com"], 3);
$student_service3->delete(3);
print_r($student_service3->get_all());
*/