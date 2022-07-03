<?php include("layouts/header.php"); ?>
<?php include("../../database/database.php");



$id = "";
$id = $_GET['id'];

if ($id != null) {
    $db = new database();
    $result = $db->select("produk", "*", "id = '$id'");
    $result = mysqli_fetch_assoc($result);
    
}

?>

<div class="containter p-5">

    <div class="row g-5 px-md-5 justify-content-center">
        <div class="col-md-5 col-lg-5">
            <form class="needs-validation" method="POST" action="../../database/operation/edit.php">
                <h4 class="mb-3">Edit Produk</h4>
                <input type="text" value="<?= $result['id'] ?>" name="id" hidden>
                <div class="row g-3 mb-3">
                    <div class="col-sm-12">
                        <label for="p_nama" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="p_nama" name="p_nama" placeholder="" value="<?= $result['p_nama'] ?>" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="p_stok" class="form-label">Quantity</label>
                        <input type="text" class="form-control" id="p_stok" name="p_stok" placeholder="" value="<?= $result['p_stok'] ?>" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="p_harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="p_harga" name="p_harga" placeholder="" value="<?= $result['p_harga'] ?>" required>
                    </div>
                    <div class="col-sm-12">
                        <label for="kid" class="form-label">Kategori</label>
                        <select class="form-select" id="kp_kode" name="kp_kode" required>
                            <?php
                            $result = $db->select("kategori", "*");
                            
                            ?>
                            <option value="" selected>Pilih Kategori</option>
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
                            <option value="" selected>Pilih Brand</option>
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <option value="<?php echo $row['bp_kode'] ?>"><?php echo $row['bp_name'] ?></option>
                            <?php } ?>

                        </select>
                    </div>


                    <div class="col-sm-12 mb-4">
                        <label for="p_foto" class="form-label">Foto Produk</label>
                        <input class="form-control" type="file" id="foto" name="p_foto">
                    </div>

                    <div class="col-sm-12 mb-4">
                        <label for="p_deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="p_deskripsi" rows="3" name="p_deskripsi"></textarea>
                    </div>

                </div>


                <div class="col-12 mt-3 text-center">
                    <button class="btn btn-dark px-4" type="submit" name="p_submit">Simpan</button>
                </div>


            </form>
        </div>
    </div>

</div>
<?php include("layouts/footer.php"); ?>