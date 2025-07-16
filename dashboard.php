<?php
include 'partials/header.php';

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user'];
?>

<h2>Dashboard</h2>

<p>Welcome, <?php echo $user['username']; ?>!</p>

<p>Email: <?php echo $user['email']; ?></p>

<?php if ($user['role'] === 'admin'): ?>
    <p>You are an admin.</p>
<?php endif; ?>

<!-- Your dashboard content goes here -->

<?php
include 'partials/footer.php';
?>
