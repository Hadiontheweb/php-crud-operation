<?php
session_start();
include_once('config.php');

if (!$connection) {
    throw new Exception('not connceted');
}
// 
$action = $_POST['action'] ?? '';

if ($action == 'register') {

    $email = $_POST['email'];
    $pass  = $_POST['password'];
    $status = $_POST['status'];

 
    if ($email != '' && $pass != '') {

        // Check if email already exists
        $check = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($connection, $check);

        if (mysqli_num_rows($result) > 0) {

            header("Location: register.php?status=exists");
            exit;
        } else {

            // Insert user

            $insert = "INSERT INTO users (email,password) VALUES ('$email','$pass')";
            $isdone = mysqli_query($connection, $insert);

            if ($isdone) {
                header("Location: register.php?status=inserted");
                exit;
            } else {
                echo "Insert failed";
            }
        }
    }
} else if ($action == 'edit') {
    $email = $_POST['email'];
    $editid = $_GET['editid'];
    $update = "UPDATE users SET email='$email' WHERE id='$editid' ";
    $isdone = mysqli_query($connection, $update);
    echo $isdone;
    if ($isdone) {

        header("location:user-list.php??status=updated");
    } else {
        echo 'not connected';
    }
} else if ($action == 'signin') {
    $email = $_POST['email'];
    $FormPassword = $_POST['password'];
    $query = "select * from users where email='$email'";
    $EmailIsExist = mysqli_query($connection, $query);
    if (mysqli_num_rows($EmailIsExist) > 0) {
        $data = mysqli_fetch_assoc($EmailIsExist);
        $DbPassword = $data['password'];
        $userId = $data['id'];
        if ($DbPassword === $FormPassword) {
            $_SESSION['id'] = $userId;
            header('location:user-list.php');
        } else {
            $status = 'Email and password didnt match';
            header("location:signin.php?status={$status}");
            exit;
        }
    } else {
        $status = 'Given Email is not registered';
        header("location:signin.php?status={$status}");
        exit;
    }
}
