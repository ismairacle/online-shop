<?php


include("layouts/header.php");
include("../../database/database.php");
require("helpers.php");

if (!$_SESSION['is_login']) {
    header("location: ../auth/login.php");
}
$db = new database();
$products = $db->select_limit("produk", "*", 0, 4, true);


?>

<!-- Header-->
<header class="bg-white py-5">
    <div class="container px-4 pt-5 px-lg-5 my-5">
        <div class="text-center text-dark">
            <h1 class="display-4 fw-bolder">Selamat Datang <?php echo $_SESSION['gender'] . ' ' . $_SESSION['cus_name'] ?></h1>
            <p class="lead fw-normal text-dark-50 mb-0">Website ini dibuat untuk memenuhi tugas Mata Kuliah Pemrograman Web 2</p>
            <div class="row justify-content-center">
                <div class="col-6 text-center">
                    <form action="cari.php" method="post">
                        <div class="input-group mt-5">
                            <input type="text" class="form-control" placeholder="Masukan Nama barang" name="query">
                            <button type="submit" class="input-group-text" id="basic-addon2">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Section-->
<section class="py-3 mt-5 bg-light">
    <div class="container  px-4 px-lg-5 mt-5">
        <h3 class="text-center mb-5">Produk Terbaru</h3>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            <?php

            $images = "../../images/";
            while ($product = mysqli_fetch_assoc($products)) {
                $promo = $db->cek_promo($product['id']);
                $images .= $product['p_photo'];
                if ($promo != 0) {
                    $price = $product['p_harga'] - $promo;
                    show_products_discount($product['p_nama'], $product['p_harga'], $price, $product['id'], $images);
                } else {
                    show_products($product['p_nama'], $product['p_harga'], $product['id'], $images);
                }

                $images = "../../images/";

            }
            ?>

        </div>

</section>
<?php include("layouts/footer.php"); ?>