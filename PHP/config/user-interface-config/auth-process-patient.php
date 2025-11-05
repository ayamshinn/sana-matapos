<?php
ob_start();
session_start();

$dbPath = __DIR__ . '/../connection-db.php';
if (!file_exists($dbPath)) {
    die("Missing required file: $dbPath");
}
require_once $dbPath;

/* -------------------------------------------------
   PATIENT LOGIN (Triggered by "signin")
--------------------------------------------------*/
if (isset($_POST['signin'])) {

    $username = trim($_POST['signin-username']);
    $password = trim($_POST['signin-pass']);

    $query = "SELECT 
                u.user_id, 
                u.username, 
                u.password_hash, 
                u.first_name, 
                u.last_name, 
                r.role_name
              FROM Users_tb u
              INNER JOIN Roles_tb r ON u.role_id = r.role_id
              WHERE u.username = ?
              LIMIT 1";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        // Ensure this user is a Patient
        if (strtolower($user['role_name']) !== "patient") {
            $_SESSION['error'] = "This login is for patients only!";
            header("Location: ../../user-interface/index.php?auth=failed");
            exit();
        }
        if (password_verify($password, $user['password_hash'])) {

            $_SESSION['user_id'] = $user['user_id']; // Keep for session guards
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = "Patient";

            // ✅ Load User Display Name
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];

            header("Location: ../../patient-ui/patient-main.php");
            exit();
        }
    }

    $_SESSION['error'] = "Invalid patient login!";
    header("Location: ../../user-interface/index.php?auth=failed");
    exit();
}
?>
