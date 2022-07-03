<?php $active = 'promo' ?>
<?php include("layouts/header.php");
require("helpers.php");

include("../../database/database.php");
include("../../database/pagination.php");
$db = new database();
$pg = new pagination();


$products = $pg->paginate_table("promo_produk", 4);

?>


<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Daftar Promo yang sedang berlangsung</h2>
        <p class="fw-normal text-dark-50 mb-5">Dapatkan barang-barang elektronik pilihan dengan harga terbaik hanya untuk anda</p>

        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            <?php

            $images = "../../images/";
            foreach ($products as $key => $value) {

                $id = $value['id_produk'];
                $product = mysqli_fetch_assoc($db->select("produk", "*", "id = $id"));
                $promo = $db->cek_promo($product['id']);
                $images .= $product['p_photo'];
                $price = $product['p_harga'] - $promo;
                show_products_discount($product['p_nama'], $product['p_harga'], $price, $product['id'], $images);
                $images = "../../images/";
            }
            ?>
        </div>
        <div class="row">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link text-dark" <?php if ($pg->halaman > 1) {
                                                        echo "href='?halaman=$pg->previous'";
                                                    } ?>>Previous</a>
                </li>

                <?php
                for ($i = 1; $i <= $pg->total_halaman; $i++) {
                ?>
                    <li class="page-item text-dark"><a class="page-link text-secondary <?php if ($i == $pg->halaman) {
                                                                                            echo "text-dark fw-bold";
                                                                                        } ?>" href="?halaman=<?php echo $i ?>"><?php echo $i; ?></a></li>
                <?php
                }
                ?>

                <li class="page-item text-dark">
                    <a class="page-link text-dark" <?php if ($pg->halaman < $pg->total_halaman) {
                                                        echo "href='?halaman=$pg->next'";
                                                    } ?>>Next</a>
                </li>
            </ul>
        </div>

</section>
<?php include("layouts/footer.php"); ?>