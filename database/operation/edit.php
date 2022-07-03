<?php

include("../database.php");
$table = "";
$result = array();
$kp_kode = "";
$bp_kode = "";
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}


if (isset($_POST['p_submit'])) {

    $result = [
        'p_nama' => $_POST['p_nama'],
        'p_stok' => $_POST['p_stok'],
        'p_harga' => $_POST['p_harga'],
        'p_kp_kode' => $_POST['kp_kode'],
        'p_bp_kode' => $_POST['bp_kode']
    ];

    $table = "produk";
}

if (isset($_POST['pr_submit'])) {

    $id = $_POST['id'];
    $result = [
        'pr_nama' => $_POST['pr_nama'],
        'pr_potongan' => $_POST['pr_potongan'],
        'pr_mulai' => $_POST['pr_mulai'],
        'pr_selesai' => $_POST['pr_selesai']

    ];

    $table = "promo";
}

if (isset($_POST['pr_submit_set'])) {

    $id = $_POST['id'];
    $result = [
        'id_promo' => $_POST['id_promo'],
        'id_produk' => $_POST['id_produk']

    ];

    $table = "promo_produk";
}


if (isset($_POST['cus_submit'])) {

    $result = [
        'cus_name' => $_POST['cus_name'],
        'cus_username' => $_POST['cus_username'],
        'cus_gender' => $_POST['cus_gender'],
        'cus_address' => $_POST['cus_address'],
        'cus_phone' => $_POST['cus_phone'],
        'cus_email' => $_POST['cus_email']
    ];

    $table = "customer";
}

if (isset($_POST['kp_submit'])) {

    $kp_kode = $_GET['kode'];
    $kategori = [
        'kp_kode' => $_POST['kp_kode'],
        'kp_nama' => $_POST['kp_nama']
    ];
    $result = $kategori;
    $table = 'kategori';
}

if (isset($_POST['bp_submit'])) {

    $bp_kode = $_GET['kode'];
    $brand = [
        'bp_kode' => $_POST['bp_kode'],
        'bp_name' => $_POST['bp_name']
    ];
    $result = $brand;
    $table = 'brand';
}


try {
    $db = new database();

    if ($table == 'kategori' || $table == 'brand') {
        if ($table == 'kategori') {
            $db->update($table, $result, "kp_kode = '$kp_kode'");
        } else {
            var_dump($db->update($table, $result, "bp_kode = '$bp_kode'"));
        }
    } else {
        $db->update($table, $result, "id = $id");
    }




    $host  = $_SERVER['HTTP_HOST'] . '/online-shop';
    header("Location: http://$host/views/admin/index.php");        

} catch (\Throwable $th) {
    throw $th;
}
