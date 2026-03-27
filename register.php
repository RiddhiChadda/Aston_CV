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
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $keyprogramming = $_POST["keyprogramming"];
    $profile = $_POST["profile"];
    $education = $_POST["education"];
    $URLlinks = $_POST["URLlinks"];

    $result = registerCV(
        $conn,
        $name,
        $email,
        $password,
        $keyprogramming,
        $profile,
        $education,
        $URLlinks
    );

    if ($result) {
        $message = "Registration successful.";
        $success = true;
    } else {
        $message = "Something went wrong. Please try again.";
    }
}
?>

<h2>Register</h2>

<?php if ($success): ?>
    <div class="success-box">
        <h3>Registration Successful</h3>
        <p>Your CV has been added successfully.</p>
        <a href="login.php" class="primary-link-button">Go to Login</a>
    </div>
<?php else: ?>

    <?php if ($message != ""): ?>
        <p class="error-text"><?php echo $message; ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="name">Name</label><br>
        <input type="text" name="name" id="name" required><br><br>

        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" required><br><br>

        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" required><br><br>

        <label for="keyprogramming">Key Programming Language</label><br>
        <input type="text" name="keyprogramming" id="keyprogramming"><br><br>

        <label for="profile">Profile</label><br>
        <textarea name="profile" id="profile"></textarea><br><br>

        <label for="education">Education</label><br>
        <textarea name="education" id="education"></textarea><br><br>

        <label for="URLlinks">URL Links</label><br>
        <input type="text" name="URLlinks" id="URLlinks"><br><br>

        <button type="submit">Register CV</button>
    </form>

<?php endif; ?>

<?php include 'includes/footer.php'; ?>