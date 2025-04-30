<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . "/../rest/services/StudentServicev3.php";

class StudentServiceTest extends TestCase {
  public function testFormatName() {
    $student_service = new StudentServicev3();
    $this->assertEquals("Alice", $student_service->formatName(["name" => "aLiCe"]));
  }
}
