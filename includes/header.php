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
        <div class="header-top">
            <h1>AstonCV</h1>

            <?php if (isset($_SESSION["user_name"])): ?>
                <p class="welcome-text">
                    Welcome, <?php echo htmlspecialchars($_SESSION["user_name"]); ?>
                </p>
            <?php endif; ?>
        </div>

        <nav class="navbar">
            <div class="nav-main">
                <a href="index.php">Home</a>

                <?php if (isset($_SESSION["user_id"])): ?>
                    <a href="cvs.php">View CVs</a>
                    <a href="search.php">Search</a>
                    <a href="edit_cv.php">Edit My CV</a>
                <?php endif; ?>
            </div>

            <div class="nav-auth">
                <?php if (isset($_SESSION["user_id"])): ?>
                    <a href="logout.php" class="logout-link">Logout</a>
                <?php else: ?>
                    <a href="login.php">Login</a>
                    <a href="register.php">Register</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>
    <main>