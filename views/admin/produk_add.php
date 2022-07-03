<?php include("layouts/header.php"); ?>
<?php include("../../database/database.php");
$db = new database();

?>



<div class="containter p-5">

    <div class="row g-5 px-md-5 justify-content-center">
        <div class="col-md-5 col-lg-5">
            <form class="needs-validation" method="POST" action="../../database/operation/insert.php" enctype="multipart/form-data">
                <h4 class="mb-3">Tambah Produk</h4>

                <div class="row g-3 mb-3">
                    <!-- <div class="col-sm-12">
                        <label for="p_kode" class="form-label">Kode Produk</label>
                        <input type="text" class="form-control" id="p_kode" name="p_kode" placeholder="" required>
                    </div> -->
                    <div class="col-sm-12">
                        <label for="p_nama" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="p_nama" name="p_nama" placeholder="" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="p_stok" class="form-label">Quantity</label>
                        <input type="text" class="form-control" id="p_stok" name="p_stok" placeholder="" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="p_harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="p_harga" name="p_harga" placeholder="" required>
                    </div>

                    <div class="col-sm-12">
                        <label for="kp_kode" class="form-label">Kategori</label>
                        <select class="form-select" id="kp_kode" name="kp_kode" required>
                            <?php
                            $result = $db->select("kategori", "*");

                            ?>
                            <option selected>Pilih Kategori</option>
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <option value="<?php echo $row['kp_kode'] ?>"><?php echo $row['kp_nama'] ?></option>
                            <?php } ?>

                        </select>
                    </div>

                    <div class="col-sm-12">
                        <label for="bp_kode" class="form-label">Brand</label>
                        <select class="form-select" id="kp_kode" name="bp_kode" required>
                            <?php
                            $result = $db->select("brand", "*");

                            ?>
                            <option selected>Pilih Brand</option>
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <option value="<?php echo $row['bp_kode'] ?>"><?php echo $row['bp_name'] ?></option>
                            <?php } ?>

                        </select>
                    </div>


                    <div class="col-sm-12 ">
                        <label for="p_photo" class="form-label">Foto Produk</label>
                        <input class="form-control" type="file" id="foto" name="p_photo">
                    </div>

                    <div class="col-sm-12 mb-4">
                        <label for="p_deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="p_deskripsi" rows="3" name="p_deskripsi"></textarea>
                    </div>

                </div>


                <div class="col-12 mt-3 text-center">
                    <button class="btn btn-dark px-4" type="submit" name="p_submit">Input Produk</button>
                </div>


            </form>
        </div>
    </div>

</div>
<?php include("layouts/footer.php"); ?>