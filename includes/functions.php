<?php

function emailExists($conn, $email, $excludeId = null)
{
    if ($excludeId === null) {
        $sql = "SELECT id FROM cvs WHERE email = ?";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("s", $email);
    } else {
        $sql = "SELECT id FROM cvs WHERE email = ? AND id != ?";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("si", $email, $excludeId);
    }

    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }

    $result = $stmt->get_result();
    return $result->num_rows > 0;
}

function registerCV($conn, $name, $email, $password, $keyprog)
{
    if (emailExists($conn, $email)) {
        return "email_exists";
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO cvs (name, email, password, keyprogramming)
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param(
        "ssss",
        $name,
        $email,
        $hashedPassword,
        $keyprog
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

    if (password_verify($password, $user["password"])) {
        return $user;
    } else {
        return "wrong_password";
    }
}

function getCVById($conn, $id)
{
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

    if ($result->num_rows === 1) {
        return $result->fetch_assoc();
    }

    return false;
}

function updateCV(
    $conn,
    $id,
    $name,
    $email,
    $keyprog,
    $profile,
    $education,
    $links,
    $phone,
    $location,
    $skills,
    $experience,
    $projects
) {
    if (emailExists($conn, $email, $id)) {
        return "email_exists";
    }

    $sql = "UPDATE cvs
            SET name = ?,
                email = ?,
                keyprogramming = ?,
                profile = ?,
                education = ?,
                URLlinks = ?,
                phone = ?,
                location = ?,
                skills = ?,
                experience = ?,
                projects = ?
            WHERE id = ?";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param(
        "sssssssssssi",
        $name,
        $email,
        $keyprog,
        $profile,
        $education,
        $links,
        $phone,
        $location,
        $skills,
        $experience,
        $projects,
        $id
    );

    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }

    return true;
}

?>