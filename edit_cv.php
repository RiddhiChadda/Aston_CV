<?php
include 'includes/auth.php';
include 'includes/config.php';
include 'includes/functions.php';

$userId = $_SESSION["user_id"];
$message = "";
$success = false;

$cv = getCVById($conn, $userId);

if (!$cv) {
    include 'includes/header.php';
    echo "<p class='error-text'>Your CV record could not be found.</p>";
    include 'includes/footer.php';
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $keyprogramming = trim($_POST["keyprogramming"]);
    $profile = trim($_POST["profile"]);
    $education = trim($_POST["education"]);
    $URLlinks = trim($_POST["URLlinks"]);

    if ($name == "" || $email == "") {
        $message = "Name and email are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Please enter a valid email address.";
    } else {
        $result = updateCV(
            $conn,
            $userId,
            $name,
            $email,
            $keyprogramming,
            $profile,
            $education,
            $URLlinks
        );

        if ($result === true) {
            $_SESSION["user_name"] = $name;
            $_SESSION["user_email"] = $email;

            $message = "Your CV has been updated successfully.";
            $success = true;

            $cv = getCVById($conn, $userId);
        } elseif ($result === "email_exists") {
            $message = "That email is already being used by another account.";
        } else {
            $message = "Something went wrong. Please try again.";
        }
    }
}

include 'includes/header.php';
?>

<h2>Edit My CV</h2>

<?php if ($message != ""): ?>
    <?php if ($success): ?>
        <div class="success-box">
            <h3>Update Successful</h3>
            <p><?php echo htmlspecialchars($message); ?></p>
        </div>
    <?php else: ?>
        <p class="error-text"><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>
<?php endif; ?>

<form method="POST" action="edit_cv.php">
    <label for="name">Name</label><br>
    <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($cv['name']); ?>" required><br><br>

    <label for="email">Email</label><br>
    <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($cv['email']); ?>" required><br><br>

    <label for="keyprogramming">Key Programming Language</label><br>
    <input type="text" name="keyprogramming" id="keyprogramming" value="<?php echo htmlspecialchars($cv['keyprogramming']); ?>"><br><br>

    <label for="profile">Profile</label><br>
    <textarea name="profile" id="profile"><?php echo htmlspecialchars($cv['profile']); ?></textarea><br><br>

    <label for="education">Education</label><br>
    <textarea name="education" id="education"><?php echo htmlspecialchars($cv['education']); ?></textarea><br><br>

    <label for="URLlinks">URL Links</label><br>
    <input type="text" name="URLlinks" id="URLlinks" value="<?php echo htmlspecialchars($cv['URLlinks']); ?>"><br><br>

    <button type="submit">Update My CV</button>
</form>

<?php include 'includes/footer.php'; ?>