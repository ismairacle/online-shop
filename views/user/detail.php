<?php



include("layouts/header.php");
include("../../database/database.php");
include("helpers.php");

if (!$_SESSION['is_login']) {
    header("location: ../auth/login.php");
}


$db = new database();
$id = $_GET['id'];
$prd = mysqli_fetch_assoc($db->select("produk", "*", "id = '$id'"));

$kode_barang = $prd['p_bp_kode'];
$products = $db->select_limit("produk", "*", 0, 4, false, "p_bp_kode = '$kode_barang'");
$brand = mysqli_fetch_assoc($db->select("brand", "*", "bp_kode = '$kode_barang'"))['bp_name'];

$images = "../../images/";
?>


<!-- Product section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6 text-center " style="height: 300px;"><img class="img-fluid mb-5 mb-md-0" src="<?php echo $images . $prd['p_photo'] ?>" alt="..." style="height: 300px;"/></div>
            <div class="col-md-6">

                <h1 class="display-5 fw-bolder"><?= $prd['p_nama'] ?></h1>
                <div class="fs-5 mb-3">
                    <?php 
                    $promo = $db->cek_promo($id);
                    if ($promo != 0) {
                        $price = $prd['p_harga'] - $promo;
                        echo '<span class="text-decoration-line-through">' . rupiah($prd['p_harga']) . '</span><br>';
                        echo '<span>' . rupiah($price) . '</span>';
                    } else {
                        $price = $prd['p_harga'];
                        echo '<span>' . rupiah($price) . '</span>';
                    } ?>
                </div>
                <p class="lead"><?= $prd['p_deskripsi'] ?></p>
                <span class="lead">Stok : <?= $prd['p_stok']?></span>
                <div class="d-flex">
                    <form class="row g-3 mt-2" action="proses_keranjang.php" method="POST">
                    <input type="num" value="<?= $price ?>" name="p_harga" hidden/>
                    <input type="num" value="<?= $id ?>" name="id" hidden/>
                    <input type="text" value="<?= $prd['p_nama'] ?>" name="p_nama" hidden/>
                    <input type="text" value="<?= $brand ?>" name="p_brand" hidden/>

                        <div class="col-auto">
                        <input type="number" name="p_qty" class="form-control" value="1" min="1" max="<?=$prd['p_stok']?>" required>
                        </div>
                        <div class="col-auto">
                            <button type="submit" name="kp_submit" class="btn btn-dark mb-3"> <i class="bi-cart-fill me-1"></i>
                                Tambah ke keranjang
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Related items section-->
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Produk lainnya</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
            while ($product = mysqli_fetch_assoc($products)) {
                $images .= $product['p_photo'];
                $promo = $db->cek_promo($product['id']);
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

    </div>
</section>
<?php include("layouts/footer.php"); ?>