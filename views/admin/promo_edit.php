<?php include("layouts/header.php"); ?>
<?php include("../../database/database.php");



$id = "";
$id = $_GET['id'];

if ($id != null) {
    $db = new database();
    $result = $db->select("promo", "*", "id = '$id'");
    $result = mysqli_fetch_assoc($result);
}

?>

<div class="containter p-5">

    <div class="row g-5 px-md-5 justify-content-center">
        <div class="col-md-5 col-lg-5">
            <form class="needs-validation" method="POST" action="../../database/operation/edit.php">
                <h4 class="mb-3">Edit Promo</h4>
                <input type="text" value="<?= $result['id'] ?>" name="id" hidden>
                <div class="row g-3 mb-3">
                    <div class="col-sm-12">
                        <label for="pr_nama" class="form-label">Nama Promo</label>
                        <input type="text" class="form-control" id="pr_nama" name="pr_nama" placeholder="" value="<?= $result['pr_nama'] ?>" required>
                    </div>
                    <div class="col-sm-12">
                        <label for="pr_potongan" class="form-label">Potongan</label>
                        <input type="number" class="form-control" id="pr_potongan" name="pr_potongan" placeholder="" value="<?= $result['pr_potongan'] ?>" required>
                    </div>
                    <div class="col-sm-12">
                        <label for="pr_mulai" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="pr_mulai" name="pr_mulai" placeholder="" value="<?= $result['pr_mulai'] ?>" required>
                    </div>
                    <div class="col-sm-12">
                        <label for="pr_selesai" class="form-label">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="pr_selesai" name="pr_selesai" placeholder=""  value="<?= $result['pr_selesai'] ?>"required>
                    </div>

                </div>


                <div class="col-12 mt-3 text-center">
                    <button class="btn btn-dark px-4" type="submit" name="pr_submit">Simpan</button>
                </div>


            </form>
        </div>
    </div>

</div>
<?php include("layouts/footer.php"); ?>