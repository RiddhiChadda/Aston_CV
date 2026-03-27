<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AstonCV</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>AstonCV</h1>

        <?php if (isset($_SESSION["user_name"])): ?>
            <p>Welcome, <?php echo htmlspecialchars($_SESSION["user_name"]); ?></p>
        <?php endif; ?>

        <nav>
            <a href="index.php">Home</a>
            <a href="cvs.php">View CVs</a>
            <a href="search.php">Search</a>

            <?php if (isset($_SESSION["user_id"])): ?>
                <a href="edit_cv.php">Edit My CV</a>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="register.php">Register</a>
                <a href="login.php">Login</a>
            <?php endif; ?>
        </nav>
    </header>
    <main>