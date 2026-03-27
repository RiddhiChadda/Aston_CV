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

function loginCV($conn, $email, $password)
{
    $sql = "SELECT * FROM cvs WHERE email = ?";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("s", $email);

    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }

    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        return "no_user";
    }

    $user = $result->fetch_assoc();

    if ($user["password"] == $password) {
        return $user;
    } else {
        return "wrong_password";
    }
}


?>