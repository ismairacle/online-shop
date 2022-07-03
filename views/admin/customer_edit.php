<?php include("layouts/header.php"); ?>
<?php include("../../database/database.php");



$id = "";
$id = $_GET['id'];

if ($id != null) {
    $db = new database();
    $result = $db->select("customer", "*", "id = '$id'");
    $result = mysqli_fetch_assoc($result);
}

?>

<div class="containter p-5">

    <div class="row g-5 px-md-5 justify-content-center">
        <div class="col-md-5 col-lg-5">
            <form class="needs-validation" method="POST" action="../../database/operation/edit.php?id=<?= $id ?>">
                <h4 class="mb-3">Edit Data Customer</h4>

                <div class="row g-3 mb-3">
                    <div class="col-sm-12">
                        <label for="cus_name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="cus_name" name="cus_name" placeholder="" value="<?= $result['cus_name'] ?>" required>
                    </div>
                    <div class="col-sm-12">
                        <label for="cus_username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="cus_username" name="cus_username" placeholder="" value="<?= $result['cus_username'] ?>" required>
                    </div>

                    <div class="col-sm-12">
                        <label for="cus_phone" class="form-label">No. Telepon</label>
                        <input type="text" class="form-control" id="cus_phone" name="cus_phone" placeholder="" value="<?= $result['cus_phone'] ?>" required>
                    </div>

                    <div class="col-sm-12">
                        <label for="cus_email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="cus_email" name="cus_email" placeholder="" value="<?= $result['cus_email'] ?>" required>
                    </div>

                    <div class="col-sm-12">
                        <label for="cus_gender" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="cus_gender" name="cus_gender" required>
                            <option value="" selected>Pilih Jenis Kelamin</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>

                        </select>
                    </div>



                    <div class="col-sm-12 mb-4">
                        <label for="cus_address" class="form-label">Alamat</label>
                        <textarea class="form-control" id="cus_address" rows="3" name="cus_address"></textarea>
                    </div>

                </div>


                <div class="col-12 mt-3 text-center">
                    <button class="btn btn-dark px-4" type="submit" name="cus_submit">Simpan</button>
                </div>


            </form>
        </div>
    </div>

</div>
<?php include("layouts/footer.php"); ?>