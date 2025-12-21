<?php

session_start();

$username = $_POST['username'];

$email    = $_POST['email'];

$phone    = $_POST['phone'];

$password = $_POST['password'];

$cpass    = $_POST['confirmpassword'];

$role     = $_POST['role'];

/* Check password match */

if ($password !== $cpass) {

    echo "<script>

        alert('Password does not match');

        window.location.href='registration.html';
</script>";

    exit();

}

/* Server-side phone validation */

if (!ctype_digit($phone)) {

    echo "<script>

        alert('Phone number must contain only digits');

        window.location.href='registration.html';
</script>";

    exit();

}

/* Save registration data in session */

$_SESSION['reg_username'] = $username;

$_SESSION['reg_password'] = $password;

$_SESSION['reg_email']    = $email;

$_SESSION['reg_phone']    = $phone;

$_SESSION['reg_role']     = $role;

echo "<script>

    alert('Registration Successful! Now login.');

    window.location.href='Login.html';
</script>";

?>
 