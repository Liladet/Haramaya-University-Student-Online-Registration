<?php
include 'partials/header.php';

session_start();

require_once 'includes/functions.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    if (empty($username) || empty($email) || empty($password)) {
        $errors[] = "All fields are required";
    }

    if (empty($errors)) {
        registerUser($username, $email, $password);
        $user = loginUser($username, $password);
        $_SESSION['user'] = $user;
        header("Location: profile.php");
        exit;
    }
}
?>

<h2>Register</h2>

<form method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" required>
    <br>

    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <br>

    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <br>

    <button type="submit">Register</button>
</form>

<?php
include 'partials/footer.php';
?>
