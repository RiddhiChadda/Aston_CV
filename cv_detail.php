<?php
include 'includes/auth.php';
include 'includes/config.php';
include 'includes/header.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<p class='error-text'>No CV selected.</p>";
    include 'includes/footer.php';
    exit();
}

$id = $_GET['id'];

$sql = "SELECT * FROM cvs WHERE id = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("i", $id);

if (!$stmt->execute()) {
    die("Execute failed: " . $stmt->error);
}

$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    echo "<p class='error-text'>CV not found.</p>";
    include 'includes/footer.php';
    exit();
}

$cv = $result->fetch_assoc();
?>

<h2>CV Details</h2>

<div class="cv-detail-box">
    <p><strong>Name:</strong> <?php echo htmlspecialchars($cv['name'] ?? ''); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($cv['email'] ?? ''); ?></p>
    <p><strong>Phone:</strong> <?php echo htmlspecialchars($cv['phone'] ?? ''); ?></p>
    <p><strong>Location:</strong> <?php echo htmlspecialchars($cv['location'] ?? ''); ?></p>
    <p><strong>Key Programming Language:</strong> <?php echo htmlspecialchars($cv['keyprogramming'] ?? ''); ?></p>
    <p><strong>Skills:</strong> <?php echo nl2br(htmlspecialchars($cv['skills'] ?? '')); ?></p>
    <p><strong>Profile:</strong> <?php echo nl2br(htmlspecialchars($cv['profile'] ?? '')); ?></p>
    <p><strong>Education:</strong> <?php echo nl2br(htmlspecialchars($cv['education'] ?? '')); ?></p>
    <p><strong>Experience:</strong> <?php echo nl2br(htmlspecialchars($cv['experience'] ?? '')); ?></p>
    <p><strong>Projects:</strong> <?php echo nl2br(htmlspecialchars($cv['projects'] ?? '')); ?></p>
    <p><strong>URL Links:</strong> <?php echo htmlspecialchars($cv['URLlinks'] ?? ''); ?></p>
</div>

<p>
    <a href="cvs.php" class="primary-link-button">Back to All CVs</a>
</p>

<?php include 'includes/footer.php'; ?>