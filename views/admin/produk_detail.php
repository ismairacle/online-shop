<?php include("layouts/header.php"); ?>
<?php include("../../database/database.php");
include("helpers.php");



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
            <div class="col-md-4 text-center " style="height: 300px;"><img class="img-fluid mb-5 mb-md-0" src="<?php echo $images . $prd['p_photo'] ?>" alt="..." style="height: 300px;" /></div>
            <div class="col-md-8 ">

                <h1 class="display-5 fw-bolder"><?= $prd['p_nama'] ?></h1>
                <div class="fs-5 mb-3">
                    <form>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" id="" value="<?php echo rupiah($prd['p_harga']) ?>" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-8">
                            <textarea class="form-control" readonly id="p_deskripsi" rows="3"  disabled><?php echo $prd['p_deskripsi'] ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Stok</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" id="" value="<?php echo $prd['p_stok'] ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Brand</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" id="" value="<?php echo $brand ?>">
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
</section>



<?php include("layouts/footer.php"); ?>