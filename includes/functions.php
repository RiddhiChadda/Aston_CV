<?php

function registerCV($conn, $name, $email, $password, $keyprog, $profile, $education, $links)
{
    $sql = "INSERT INTO cvs (name, email, password, keyprogramming, profile, education, URLlinks)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param(
        "sssssss",
        $name,
        $email,
        $password,
        $keyprog,
        $profile,
        $education,
        $links
    );

    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }

    return true;
}

?>