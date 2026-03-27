<?php
session_start();

if (isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}

include 'includes/config.php';
include 'includes/functions.php';

$message = "";
$showRegisterLink = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $result = loginCV($conn, $email, $password);

    if (is_array($result)) {
        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_name"] = $result["name"];
        $_SESSION["user_email"] = $result["email"];

        header("Location: index.php");
        exit();
    } elseif ($result == "no_user") {
        $message = "Email not registered.";
        $showRegisterLink = true;
    } elseif ($result == "wrong_password") {
        $message = "Incorrect password.";
    }
}

include 'includes/header.php';
?>

<h2>Login</h2>

<?php if ($message != ""): ?>
    <p class="error-text"><?php echo $message; ?></p>

    <?php if ($showRegisterLink): ?>
        <p>
            Not registered?
            <a href="register.php">Create an account here</a>
        </p>
    <?php endif; ?>
<?php endif; ?>

<form method="POST" action="login.php">
    <label for="email">Email</label><br>
    <input type="email" name="email" id="email" required><br><br>

    <label for="password">Password</label><br>
    <input type="password" name="password" id="password" required><br><br>

    <button type="submit">Login</button>
</form>

<?php include 'includes/footer.php'; ?>