<?php
include 'includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Validate inputs
    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
        header("Location: index.php?error=emptyfields");
        exit;
    }

    if ($password !== $confirmPassword) {
        header("Location: index.php?error=passwordcheck");
        exit;
    }

    // Register the user
    $result = registerUser($username, $email, $password);

    if ($result === true) {
        header("Location: login.php?registration=success");
        exit;
    } else {
        header("Location: index.php?error={$result}");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}
?>
