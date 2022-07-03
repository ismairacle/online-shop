<?php

include("../../database/database.php");

$db = new database();


session_start();
$_SESSION['total'] = 0;

if (isset($_POST['id'], $_POST['p_qty']) && is_numeric($_POST['id']) && is_numeric($_POST['p_qty'])) {

    $prd_id = (int)$_POST['id'];
    $qty = (int)$_POST['p_qty'];
    $harga = (int)$_POST['p_harga'];
    $name = $_POST['p_nama'];
    $brand = $_POST['p_brand'];
    $photo = $_POST['p_photo'];

    if (isset($_SESSION['cart'][$prd_id])) {
        if (array_key_exists($prd_id, $_SESSION['cart'])) {
            $_SESSION['cart'][$prd_id]['qty'] += $qty;
        } else {
            $_SESSION['cart'][$prd_id]['qty'] = $qty;
        }
    } else {
        $_SESSION['cart'][$prd_id] = [
            'qty' => $qty,
            'p_nama' => $name,
            'p_harga' => $harga,
            'p_brand' => $brand,
            'p_photo' => $photo,
        ];
    }


    header('location: keranjang.php');
    exit;
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    unset($_SESSION['cart'][$id]);
    header('location: keranjang.php');
}
