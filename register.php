<?php
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

    <div style="text-align: center;">
        <h3 style="color: green;">Registration Successful</h3>
        <p>Your CV has been added successfully.</p>

        <a href="login.php" style="
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #4b2aad;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        ">
            Go to Login
        </a>
    </div>

<?php else: ?>

    <?php if ($message != ""): ?>
        <p style="color: red;"><?php echo $message; ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="name">Name</label><br>
        <input type="text" name="name" id="name"><br><br>

        <label for="email">Email</label><br>
        <input type="email" name="email" id="email"><br><br>

        <label for="password">Password</label><br>
        <input type="text" name="password" id="password"><br><br>

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