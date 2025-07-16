<?php
include 'partials/header.php';

session_start();

if (!isset($_SESSION['user']) || !is_array($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user'];
?>

<div class="profile-container">
    <h1>Student Profile</h1>

    <p>Welcome, <?php echo isset($user['username']) ? htmlspecialchars($user['username']) : 'Guest'; ?>!</p>
    <p>Email: <?php echo isset($user['email']) ? htmlspecialchars($user['email']) : 'N/A'; ?></p>

    <p><a href="logout.php">Logout</a></p>
</div>

<?php include 'partials/footer.php'; ?>
