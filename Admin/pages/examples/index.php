<?php
session_start();
include "db.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    if (empty($email)) {
        header("Location: login-v2.php?error=email is required");
        exit();
    } else if (empty($password)) {
        header("Location: login-v2.php?error=password is required");
        exit();
    } else {
        $sql = "SELECT * FROM user WHERE email=? AND password=?";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $email, $password);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['email'] === $email && $row['password'] === $password) {
                    echo "Logged in!";
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['id'] = $row['id'];
                    header("Location: profile.php");
                    exit();
                } else {
                    header("Location: login-v2.php?error=Incorrect User name or password");
                    exit();
                }
            } else {
                header("Location: login-v2.php?error=Incorrect User name or password");
                exit();
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
} else {
    header("Location: login-v2.php");
}
exit();
?>

