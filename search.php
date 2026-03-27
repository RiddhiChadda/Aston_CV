<?php
include 'includes/auth.php';
include 'includes/config.php';
include 'includes/header.php';

$searchTerm = "";
$result = null;

if (isset($_GET['query'])) {
    $searchTerm = trim($_GET['query']);

    $sql = "SELECT id, name, email, keyprogramming 
            FROM cvs 
            WHERE name LIKE ? OR keyprogramming LIKE ?
            ORDER BY id DESC";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $likeSearch = "%" . $searchTerm . "%";

    $stmt->bind_param("ss", $likeSearch, $likeSearch);

    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }

    $result = $stmt->get_result();
}
?>

<h2>Search CVs</h2>
<p>Search by name or key programming language.</p>

<form method="GET" action="search.php">
    <label for="query">Search</label><br>
    <input type="text" name="query" id="query" value="<?php echo htmlspecialchars($searchTerm); ?>" required><br><br>

    <button type="submit">Search</button>
</form>

<?php if ($result !== null): ?>
    <h3>Search Results</h3>

    <?php if ($result->num_rows > 0): ?>
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
        <p>No matching CVs found.</p>
    <?php endif; ?>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>