<?php

include("../database.php");
$table = '';
$result = array();
$message = '';

if (isset($_POST['p_submit'])) {

    $allowed = array('png', 'jpg');
    $nama = $_FILES['p_photo']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['p_photo']['tmp_name'];

    if (in_array($ekstensi, $allowed) === true) {
        move_uploaded_file($file_tmp, '../../images/' . $nama);
    } else {
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
    }

    $produk = [
        'p_nama' => $_POST['p_nama'],
        'p_stok' => $_POST['p_stok'],
        'p_harga' => $_POST['p_harga'],
        'p_deskripsi' => $_POST['p_deskripsi'],
        'p_photo' => $nama,
        'p_kp_kode' => $_POST['kp_kode'],
        'p_bp_kode' => $_POST['bp_kode']
    ];
    $result = $produk;
    $table = 'produk';
    $message = 'Produk berhasil ditambahkan';
}

if (isset($_POST['kp_submit'])) {
    $kategori = [
        'kp_kode' => $_POST['kp_kode'],
        'kp_nama' => $_POST['kp_nama']
    ];
    $result = $kategori;
    $table = 'kategori';
    $message = 'Kategori produk berhasil ditambahkan';
}


// if (isset($_POST['cus_submit'])) {
//     $customer = [
//         'cus_id' => $_POST['cus_id'],
//         'cus_nama' => $_POST['cus_nama'],
//         'cus_alamat' => $_POST['cus_alamat'],
//         'cus_phone' => $_POST['cus_phone'],
//         'cus_email' => $_POST['cus_email'],
//         'cus_password' => $_POST['cus_password']
//     ];
//     $result = $customer;
//     $table = 'customer';
//     $message = 'Customer berhasil ditambahkan';
// }

if (isset($_POST['pr_submit'])) {
    $promo = [
        'pr_nama' => $_POST['pr_nama'],
        'pr_potongan' => $_POST['pr_potongan'],
        'pr_mulai' => $_POST['pr_mulai'],
        'pr_selesai' => $_POST['pr_selesai']
    ];
    $result = $promo;
    $table = 'promo';
    $message = 'Promo berhasil ditambahkan';
}

if (isset($_POST['pr_submit_set'])) {
    $promo_produk = [
        'id_promo' => $_POST['id_promo'],
        'id_produk' => $_POST['id_produk']
    ];
    $result = $promo_produk;
    $table = 'promo_produk';
    $message = 'Promo berhasil diatur';
}


if (isset($_POST['kp_submit'])) {
    $kategori = [
        'kp_kode' => $_POST['kp_kode'],
        'kp_nama' => $_POST['kp_nama']
    ];
    $result = $kategori;
    $table = 'kategori';
    $message = 'Kategori berhasil ditambah';
}

if (isset($_POST['bp_submit'])) {
    $brand = [
        'bp_kode' => $_POST['bp_kode'],
        'bp_name' => $_POST['bp_name']
    ];
    $result = $brand;
    $table = 'brand';
    $message = 'Brand berhasil ditambah';
}

$host  = $_SERVER['HTTP_HOST'] . '/online-shop';

try {
    session_start();
    $db = new database();
    var_dump($db->insert($table, $result));
    $_SESSION['message'] = $message;
    header("Location: http://$host/views/notification/success.php");
} catch (\Throwable $th) {
    $_SESSION['message'] = 'Terjadi kesalahan';
    header("Location: http://$host/views/notification/failed.php");
}
