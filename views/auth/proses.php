<?php

// header("location: ../user/index.php");
include("../../database/database.php");

$db = new database();

$data = array();

if (isset($_GET['aksi'])) {
    session_start();
    if ($_GET['aksi'] == 'login') {
        if ($_POST['username'] == 'admin' && $_POST['password'] == 'admin1234') {
            $_SESSION['role'] = 'admin';
            header("location: ../admin/index.php");
        } else {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $result = $db->select("customer", "*", "cus_username = '$username'");
            $fetched = mysqli_fetch_assoc($result);

            if ($fetched['cus_username'] == $username && $fetched['cus_password'] == $password) {
                if ($fetched['cus_gender'] == 'L') {
                    $_SESSION['gender'] = 'Bapak';
                } elseif ($fetched['cus_gender'] == 'P') {
                    $_SESSION['gender'] = 'Ibu';
                }
                $_SESSION['cus_name'] = $fetched['cus_name'];
                $_SESSION['user_id'] = $fetched['id'];
                $_SESSION['is_login'] = true;
                $_SESSION['role'] = 'customer';
                header("location: ../user/index.php");
            } else {
                $_SESSION['message'] = 'Password dan Username yang anda masukan tidak valid';
                header("location: ../notification/failed.php");
            }
        }
    } elseif ($_GET['aksi'] == 'logout') {
        session_destroy();
        header("location: ../user/index.php");
    } elseif ($_GET['aksi'] == 'register') {
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
            header("location: ../notification/success.php");

            $db->insert('customer', $data);
        } else {
            $_SESSION['message'] = 'Password tidak sama';
            header("location: ../notification/failed.php");
        }
    }
}
