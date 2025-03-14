<?php
if (isset($_POST['calculate'])) {
    $num1 = $_POST['number1'];
    $num2 = $_POST['number2'];
    $operation = $_POST['operation'];
    $result = 0;

    if ($operation == "+") {
        $result = $num1 + $num2;
    } elseif ($operation == "-") {
        $result = $num1 - $num2;
    } elseif ($operation == "*") {
        $result = $num1 * $num2;
    } elseif ($operation == "/") {
        $result = $num2 != 0 ? $num1 / $num2 : "Cannot divide by zero";
    }

    echo "Result: $result";
}
?>
<form method="POST">
    <input type="number" name="number1" required>
    <select name="operation">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>
    <input type="number" name="number2" required>
    <button type="submit" name="calculate">Calculate</button>
</form>
