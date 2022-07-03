<?php include("layouts/header.php"); ?>
<?php include("../../database/database.php");
include("../../database/pagination.php");


?>

<?php
$db = new database();
$pg = new pagination();
$data_produk = $pg->paginate_table("promo", 5);

?>

<!-- Page content-->
<div class="container-fluid mt-5">
    <div class="row mb-3">
        <div class="col-6 px-5">
            <h1 class="h2">Promo</h1>
        </div>
        <div class="col text-end my-auto mx-5">
            <a href="promo_produk.php" class="btn btn-dark">Lihat Promo Berlangsung</a>
            <a href="promo_set.php" class="btn btn-dark">Atur Promo</a>
            <a href="promo_add.php" class="btn btn-dark">Tambah</a>
        </div>
    </div>

    <div class="row px-5 text-center">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Promo</th>
                    <th scope="col">Potongan</th>
                    <th scope="col">Mulai Promo</th>
                    <th scope="col">Selesai Promo</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($data_produk)) { ?>
                    <tr>
                        <th scope="row"><?php echo $pg->no++ ?></th>
                        <td><?php echo $row['pr_nama']; ?></td>
                        <td><?php echo $row['pr_potongan']; ?></td>
                        <td><?php echo $row['pr_mulai']; ?></td>
                        <td><?php echo $row['pr_selesai']; ?></td>
                        <td>
                            <div class="text-center">
                                <a href="promo_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </a>
                                <a href="../../database/operation/delete.php?id=<?php echo $row['id']; ?>&tbl=promo" class="btn btn-danger" onclick="confirm('Are you sure you want to delete this row?');">
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
</div>
<?php include("layouts/footer.php"); ?>