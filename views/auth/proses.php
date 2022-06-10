<?php

// header("location: ../user/index.php");
include("../../database/database.php");

$db = new database();

$data = array();

if (isset($_GET['aksi'])) {
    session_start();
    if ($_GET['aksi'] == 'login') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $db->select("customer", "*", "cus_username = '$username'");
        $result = $db->sql;
        $fetched = mysqli_fetch_assoc($result);

        if ($fetched['cus_username'] == $username && $fetched['cus_password'] == $password) {
            if ($fetched['cus_gender'] == 'L') {
                $_SESSION['message'] = 'Selamat datang Bapak';
            } else {
                $_SESSION['message'] = 'Selamat datang Ibu';
            }
            $_SESSION['cus_name'] = $fetched['cus_name'];
            
            header("location: ../user/index.php");
        }
    } else {

        if ($_POST['password1'] === $_POST['password2']) {
            // $hashed_password = password_hash($_POST['password1'], PASSWORD_DEFAULT);
            $data = [
                'cus_name' => $_POST['name'],
                'cus_username' => strtolower($_POST['username']),
                'cus_phone' => $_POST['phone'],
                'cus_gender' => $_POST['gender'],
                'cus_email' => $_POST['email'],
                'cus_address' => $_POST['address'],
                'cus_address' => $_POST['address'],
                'cus_password' => $_POST['password1']
            ];

            $_SESSION['message'] = 'Registrasi Berhasil';
            header("location: notification.php");

            $db->insert('customer', $data);
        } else {
            return $_SESSION['message'] = 'Password tidak sama';
        }
    }
}
