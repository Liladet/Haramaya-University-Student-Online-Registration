<?php
require_once 'config.php';

function loginUser($username, $password)
{
    global $pdo;

    // Retrieve user from the database based on the username
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        return "usernotfound";
    }

    // Verify the password
    if (password_verify($password, $user['password'])) {
        // Password is correct, set session and return true
        $_SESSION['user'] = $user;
        return true;
    } else {
        return "wrongpassword";
    }
}

function registerUser($username, $email, $password)
{
    global $pdo;

    // Check if the username or email already exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $stmt->execute([$username, $email]);

    if ($stmt->rowCount() > 0) {
        return "userexists";
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the user into the database
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$username, $email, $hashedPassword]);

    return true;
}
?>
