<?php
session_start();

include 'includes/config.php';
include 'includes/functions.php';
include 'includes/header.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $user = loginCV($conn, $email, $password);

    if ($user) {
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["user_name"] = $user["name"];
        $_SESSION["user_email"] = $user["email"];

        header("Location: index.php");
        exit();
    } else {
        $message = "Invalid email or password.";
    }
}
?>

<h2>Login</h2>

<?php if ($message != ""): ?>
    <p style="color: red;"><?php echo $message; ?></p>
<?php endif; ?>

<form method="POST" action="">
    <label for="email">Email</label><br>
    <input type="email" name="email" id="email" required><br><br>

    <label for="password">Password</label><br>
    <input type="password" name="password" id="password" required><br><br>

    <button type="submit">Login</button>
</form>

<?php include 'includes/footer.php'; ?>