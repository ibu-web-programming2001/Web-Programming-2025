<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    if (empty($name)) {
        echo "Name is required.<br>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.<br>";
    } elseif (!is_numeric($age) || $age < 18) {
        echo "Age must be a number greater than 18.<br>";
    } else {
        echo "Submitted Successfully! <br> Name: $name, Email: $email, Age: $age";
    }
}
?>
<form method="POST">
    Name: <input type="text" name="name"><br>
    Email: <input type="email" name="email"><br>
    Age: <input type="number" name="age"><br>
    <button type="submit">Submit</button>
</form>
