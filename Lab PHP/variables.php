<?php
$name = "John Doe"; 
$age = 25; 
$height = 1.75; 
$isStudent = true; 

echo "Name: $name <br>";
echo "Age: $age <br>";
echo "Height: $height meters<br>";
echo "Is Student: " . ($isStudent ? 'Yes' : 'No') . "<br>";

var_dump($name, $age, $height, $isStudent);
?>
