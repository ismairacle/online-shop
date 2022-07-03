<?php
session_start();
$message = '';
$redirect = '';

if (isset($_GET['cart_success'])) {
    if ($_GET['cart_success'] == 1) {
        $_SESSION['message'] = 'Checkout berhasil, silahkan buka email untuk info selanjutnya. Terimakasih sudah berbelanja';
        unset($_SESSION['cart']);
    }
}

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        $redirect = '<a href="../admin/index.php" class="btn btn-outline-dark">Ke Halaman Home</a>';
    } else {
        $redirect = '<a href="../user/index.php" class="btn btn-outline-dark">Ke Halaman Home</a>';
    }
} else {
    $redirect = '<a href="../auth/login.php" class="btn btn-outline-dark">Ke Halaman Login</a>';
}


?>
<?php include("../auth/layouts/header.php"); ?>


<div class="text-center container py-5">
    <div class="row">
        <div class="col-lg-6 col-md-8 mx-auto">
            <img src="../../assets/success.svg" width="300">

            <h5 class="mb-5"><?php
                                echo $message;
                                ?></h5>
            <?= $redirect ?>
        </div>
    </div>
</div>

<?php include("../auth/layouts/footer.php"); ?>