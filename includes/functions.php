<?php

function registerCV($conn, $name, $email, $password, $keyprog, $profile, $education, $links)
{
    $sql = "INSERT INTO cvs (name, email, password, keyprogramming, profile, education, URLlinks)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "sssssss",
        $name,
        $email,
        $password,
        $keyprog,
        $profile,
        $education,
        $links
    );

    return mysqli_stmt_execute($stmt);
}

?>