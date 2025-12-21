<?php

session_start();

/* Default admin */

$admin_user = "admin";

$admin_pass = "1234";

$username = $_POST['username'];

$password = $_POST['password'];

/* Admin login */

if ($username === $admin_user && $password === $admin_pass) {

    $_SESSION['username'] = $username;

    header("Location: dashboard.php");

    exit();

}

/* Registered user login */

if (isset($_SESSION['reg_username']) &&

    $username === $_SESSION['reg_username'] &&

    $password === $_SESSION['reg_password']) {

    $_SESSION['username'] = $username;

    header("Location: dashboard.php");

    exit();

}

echo "<script>

    alert('Invalid Username or Password');

    window.location.href='Login.html';
</script>";

?>
 