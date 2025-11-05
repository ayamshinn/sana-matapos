<?php
ob_start();
session_start();

// Robust include using __DIR__
$dbPath = __DIR__ . '/../connection-db.php';

if (!file_exists($dbPath)) {
    die("Missing required file: $dbPath");
}

require_once $dbPath;

if (isset($_POST['signup'])) {

    $fname = trim($_POST['Fname']);
    $lname = trim($_POST['Lname']);
    $email = trim($_POST['email']);
    $username = trim($_POST['Username']);
    $password = $_POST['pass'];
    $confirmPass = $_POST['Cpass'];

    // Confirm passwords match
    if ($password !== $confirmPass) {
        $_SESSION['error'] = "Passwords do not match!";
        header("Location: ../../user-interface/index.php?signup=error");
        exit();
    }

    $hashedPass = password_hash($password, PASSWORD_DEFAULT);

    // Generate User Code: USR-P-001, USR-P-002, ...
    $query = "SELECT user_code 
              FROM Users_tb 
              WHERE user_code LIKE 'USR-P-%' 
              ORDER BY user_code DESC 
              LIMIT 1";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $lastCode = $row['user_code']; // e.g., USR-P-007
        $lastNumber = intval(substr($lastCode, 6)); // Extract "007" as number
        $newNumber = $lastNumber + 1;
        $user_code = "USR-P-" . str_pad($newNumber, 3, "0", STR_PAD_LEFT);
    } else {
        $user_code = "USR-P-001";
    }

    // ✅ Insert into Users_tb only
    $sqlUser = "INSERT INTO Users_tb 
                (user_code, username, email, password_hash, role_id, first_name, last_name, created_at) 
                VALUES (?, ?, ?, ?, 
                (SELECT role_id FROM Roles_tb WHERE role_name = 'Patient'),
                ?, ?, NOW())";

    $stmtUser = mysqli_prepare($conn, $sqlUser);

    if (!$stmtUser) {
        $_SESSION['error'] = "System error. Please try again later.";
        header("Location: ../../user-interface/index.php?signup=error");
        exit();
    }

    mysqli_stmt_bind_param($stmtUser, "ssssss", 
        $user_code, $username, $email, $hashedPass, $fname, $lname
    );

    if (mysqli_stmt_execute($stmtUser)) {

        mysqli_stmt_close($stmtUser);

        $_SESSION['success'] = "Registration successful!";
        header("Location: ../../user-interface/index.php?registered=1");
        exit();

    } else {
        $_SESSION['error'] = "Registration failed. Username or email already exists.";
        header("Location: ../../user-interface/index.php?signup=error");
        exit();
    }
}
?>
