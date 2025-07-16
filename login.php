<?php
include 'partials/header.php';
include 'includes/functions.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate inputs
    if (empty($username) || empty($password)) {
        header("Location: login.php?error=emptyfields");
        exit;
    }

    // Call loginUser function to authenticate the user
    $result = loginUser($username, $password);

    if ($result === true) {
        header("Location: profile.php");
        exit;
    } else {
        header("Location: login.php?error={$result}");
        exit;
    }
}

?>

<div class="login-container">
    <h1>Login to Your Account</h1>

    <form action="login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Login</button>
    </form>

    <p>Don't have an account? <a href="register.php">Register here</a>.</p>
</div>

<?php include 'partials/footer.php'; ?>
