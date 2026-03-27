<?php
session_start();

if (isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}

include 'includes/config.php';
include 'includes/functions.php';
include 'includes/header.php';

$message = "";
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $keyprogramming = trim($_POST["keyprogramming"]);

    if ($name == "" || $email == "" || $password == "") {
        $message = "Name, email, and password are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Please enter a valid email address.";
    } elseif (strlen($password) < 6) {
        $message = "Password must be at least 6 characters long.";
    } else {
        $result = registerCV(
            $conn,
            $name,
            $email,
            $password,
            $keyprogramming
        );

        if ($result === true) {
            $message = "Registration successful.";
            $success = true;
        } elseif ($result === "email_exists") {
            $message = "This email is already registered.";
        } else {
            $message = "Something went wrong. Please try again.";
        }
    }
}
?>

<h2>Register</h2>

<?php if ($success): ?>
    <div class="success-box">
        <h3>Registration Successful</h3>
        <p>Your account has been created successfully.</p>
        <p>Please log in and go to <strong>Edit My CV</strong> to complete your full profile.</p>
        <a href="login.php" class="primary-link-button">Go to Login</a>
    </div>
<?php else: ?>

    <?php if ($message != ""): ?>
        <p class="error-text"><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="name">Name</label><br>
        <input type="text" name="name" id="name" required><br><br>

        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" required><br><br>

        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" required><br><br>

        <label for="keyprogramming">Key Programming Language</label><br>
        <input type="text" name="keyprogramming" id="keyprogramming" placeholder="Optional at registration"><br><br>

        <button type="submit">Create Account</button>
    </form>

<?php endif; ?>

<?php include 'includes/footer.php'; ?>