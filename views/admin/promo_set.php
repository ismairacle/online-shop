<?php include("layouts/header.php"); ?>
<?php include("../../database/database.php");

$db = new database();


?>



<div class="containter p-5">

    <div class="row g-5 px-md-5 justify-content-center">
        <div class="col-md-5 col-lg-5">
            <form class="needs-validation" method="POST" action="../../database/operation/insert.php" enctype="multipart/form-data">
                <h4 class="mb-3">Atur Promo</h4>

                <div class="row g-3 mb-3">
                    <!-- <div class="col-sm-12">
                        <label for="p_kode" class="form-label">Kode Produk</label>
                        <input type="text" class="form-control" id="p_kode" name="p_kode" placeholder="" required>
                    </div> -->

                    <div class="col-sm-12">
                        <label for="id_promo" class="form-label">Promo</label>
                        <select class="form-select" id="id_promo" name="id_promo" required>
                            <?php
                            $result = $db->select("promo", "id, pr_nama");

                            ?>
                            <option selected>Pilih Promo</option>
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['pr_nama'] ?></option>
                            <?php } ?>

                        </select>
                    </div>

                    <div class="col-sm-12">
                        <label for="id_produk" class="form-label">Produk</label>
                        <select class="form-select" id="id_produk" name="id_produk" required>
                            <?php
                            $result = $db->select("produk", "id, p_nama");

                            ?>
                            <option selected>Pilih Produk</option>
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['p_nama'] ?></option>
                            <?php } ?>

                        </select>
                    </div>

                
                </div>

                <div class="col-12 mt-3 text-center">
                    <button class="btn btn-dark px-4" type="submit" name="pr_submit_set">Simpan</button>
                </div>


            </form>
        </div>
    </div>

</div>
<?php include("layouts/footer.php"); ?>