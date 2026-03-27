<?php
include 'includes/auth.php';
include 'includes/config.php';
include 'includes/header.php';

$sql = "SELECT id, name, email, keyprogramming FROM cvs ORDER BY id DESC";
$result = $conn->query($sql);
?>

<h2>All CVs</h2>
<p>Browse all registered CVs below.</p>

<?php if ($result && $result->num_rows > 0): ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Key Programming Language</th>
            <th>Action</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['keyprogramming']); ?></td>
                <td>
                    <a href="cv_detail.php?id=<?php echo $row['id']; ?>">View Details</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
    <p>No CVs found.</p>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>