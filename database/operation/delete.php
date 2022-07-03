<?php

include("../database.php");

$id = $_GET['id'];
$table = $_GET['tbl'];
$a = new database();


if ($table == 'produk') {
    $res = $a->delete("promo_produk", "id_produk=$id");
    $res = $a->delete("produk", "id=$id");
}

if ($table == 'customer') {
    $res = $a->delete("customer", "id=$id");
}

if ($table == 'promo') {
    $res = $a->delete("promo_produk", "id_promo=$id");
    $res = $a->delete("promo", "id=$id");
}

if ($table == 'promo_produk') {
    $res = $a->delete("promo_produk", "id=$id");
}

if ($table == 'kategori') {
    $kode = $_GET['kp_kode'];
    $res = $a->delete("kategori", "kp_kode='$kode'");
}

if ($table == 'brand') {
    $kode = $_GET['bp_kode'];
    $res = $a->delete("brand", "bp_kode='$kode'");
}



$host  = $_SERVER['HTTP_HOST'] . '/online-shop';
header("Location: http://$host/views/admin/produk.php");
