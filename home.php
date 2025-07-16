<?php
include 'partials/header.php';

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user'];
?>

<div class="container">
    <h2>Welcome to Your Home Page, <?php echo htmlspecialchars($user['username']); ?>!</h2>

    <p>This is a secure area. You have successfully logged in.</p>

    <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>

    <?php if ($user['role'] === 'admin'): ?>
        <p>You are an admin.</p>
    <?php endif; ?>

    <!-- Your home page content goes here -->

    <p><a href="logout.php">Logout</a></p>
</div>

<?php
include 'partials/footer.php';
?>
