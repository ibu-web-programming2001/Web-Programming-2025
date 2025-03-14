<?php
session_start();
if (!isset($_SESSION['random_number'])) {
    $_SESSION['random_number'] = rand(1, 10);
}

if (isset($_POST['guess'])) {
    $guess = $_POST['guess'];
    $random = $_SESSION['random_number'];

    if ($guess < $random) {
        echo "Too low!";
    } elseif ($guess > $random) {
        echo "Too high!";
    } else {
        echo "Correct! The number was $random";
        session_destroy();
    }
}
?>
<form method="POST">
    Guess a number (1-10): <input type="number" name="guess" min="1" max="10">
    <button type="submit">Check</button>
</form>
