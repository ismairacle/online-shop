<?php
session_start();
$message = '';
$redirect = '';

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
} else {
    if (isset($_SESSION['is_login'])) {
        header("location: ../user/index.php");
    } else {
        header("location: ../auth/login.php");  
    }
}

if (isset($_SESSION['is_login'])) {
    $redirect = '<a href="../user/index.php" class="btn btn-outline-dark">Ke Halaman Home</a>';
} else {
    $redirect = '<a href="../auth/login.php" class="btn btn-outline-dark">Ke Halaman Login</a>';
}

?>
<?php include("../auth/layouts/header.php"); ?>


<div class="text-center container py-5">
    <div class="row">
        <div class="col-lg-6 col-md-8 mx-auto">
            <img src="../../assets/failed.svg" width="300">

            <h5 class="my-5"><?php
                                echo $message;
                                ?></h5>
            <?= $redirect ?>
        </div>
    </div>
</div>

<?php include("../auth/layouts/footer.php"); ?>