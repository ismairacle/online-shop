<?php include("layouts/header.php"); ?>
<?php include("../../database/database.php");
include("../../database/pagination.php");


?>

<?php
$db = new database();
$pg = new pagination();
$data_produk = $pg->paginate_table("kategori", 5);

?>

<!-- Page content-->
<div class="container-fluid mt-5">
    <div class="row mb-3">
        <div class="col-6 px-5">
            <h1 class="h2">Kategori</h1>
        </div>

    </div>

    <div class="row px-5 ">
        <div class="col-6 text-center">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Kategori</th>
                        <th scope="col">Nama Kategori</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($data_produk)) { ?>
                        <tr>
                            <th scope="row"><?php echo $pg->no++ ?></th>
                            <td><?php echo $row['kp_kode']; ?></td>
                            <td><?php echo $row['kp_nama']; ?></td>
                            <td>
                                <div class="text-center">
                                    <a href="kategori.php?id_edit=<?php echo $row['kp_kode']; ?>" class="btn btn-secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                    </a>
                                    <a href="../../database/operation/delete.php?kp_kode=<?php echo $row['kp_kode']; ?>&tbl=kategori" class="btn btn-danger" onclick="confirm('Are you sure you want to delete this row?');">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <nav>
                <ul class="pagination justify-content-end">
                    <li class="page-item">
                        <a class="page-link text-dark" <?php if ($pg->halaman > 1) {
                                                            echo "href='?halaman=$pg->previous'";
                                                        } ?>>Previous</a>
                    </li>

                    <?php
                    for ($i = 1; $i <= $pg->total_halaman; $i++) {
                    ?>
                        <li class="page-item text-dark"><a class="page-link text-dark <?php if ($i == $pg->halaman) {
                                                                                            echo "bg-secondary";
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
            </nav>
        </div>

        <div class="col-6 px-5">
            <?php
            $kode = "";
            $nama = "";
            $title = "Tambah Kategori";
            $action = "../../database/operation/insert.php";


            if (isset($_GET['id_edit'])) {
                $kode = $_GET['id_edit'];
                $res = mysqli_fetch_assoc($db->select("kategori", "*", "kp_kode = '$kode'"));
                $nama = $res['kp_nama'];
                $title = "Edit Kategori";
                $action = "../../database/operation/edit.php?kode=$kode";
            }

            ?>
            <form class="needs-validation" method="POST" action="<?= $action ?>" enctype="multipart/form-data">

                <h4 class="mb-3"><?= $title ?></h4>

                <div class="row g-3 mb-3">

                    <div class="col-sm-12">
                        <label for="kp_kode" class="form-label">Kode Kategori</label>
                        <input type="text" class="form-control" id="kp_kode" name="kp_kode" placeholder="" value="<?= $kode ?>" required>
                    </div>
                    <div class="col-sm-12">
                        <label for="kp_nama" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="kp_nama" name="kp_nama" placeholder="" value="<?= $nama ?>" required>
                    </div>



                </div>

                <div class="col-12 mt-3 text-center">
                    <button class="btn btn-dark px-4" type="submit" name="kp_submit">Simpan</button>
                </div>


            </form>
        </div>

    </div>
</div>
<?php include("layouts/footer.php"); ?>