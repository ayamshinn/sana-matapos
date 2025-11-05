<?php
session_start();
require_once("../../config/connection-db.php");

// Hash the admin password securely
$password = password_hash("acudentAdminPass2025", PASSWORD_DEFAULT);

// Insert Super Admin account
$query = "
INSERT INTO Users_tb (
    user_code, 
    role_id, 
    username, 
    password_hash, 
    email, 
    first_name, 
    last_name, 
    created_at
) VALUES (
    'USR-A-001',
    1, 
    'superadmin_users',
    '$password',
    'admin@acudent.com',
    'Super',
    'Admin',
    NOW()
)";

// Execute query
if (mysqli_query($conn, $query)) {
    echo '✅ Super Admin account created successfully!';
} else {
    echo '❌ Error: ' . mysqli_error($conn);
}
?>



