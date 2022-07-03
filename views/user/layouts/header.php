<?php session_start();
$name = $_SESSION['cus_name'];
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Ismail Store - 191011400124</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>


    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">

        <?php
        $active_class = "col-8 border-bottom border-4 mx-auto";
        ?>
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.php">Ismail Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item">
                        <div><a class="nav-link" href="belanja.php">Belanja</a>
                            <div class="<?php if ($active == 'belanja') {
                                            echo $active_class;
                                        } ?>"></div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div><a class="nav-link" href="promo.php">Promo</a>
                            <div class="<?php if ($active == 'promo') {
                                            echo $active_class;
                                        } ?>"></div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div><a class="nav-link" href="keranjang.php">Keranjang<span class="ms-2 badge rounded-pill bg-secondary">
                                    <?php
                                    if (isset($_SESSION['cart'])) {
                                        echo sizeof($_SESSION['cart']);
                                    } else {
                                        echo '0';
                                    }
                                    ?>
                                </span></a>
                            <div class="<?php if ($active == 'keranjang') {
                                            echo $active_class;
                                        } ?>"></div>
                        </div>
                    </li>
                </ul>


                <ul class="navbar-nav">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= $name ?></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <form action="../../views/auth/proses.php?aksi=logout" method="post">
                                <li><button type="submit" class="dropdown-item mb-0">Logout</button></li>
                            </form>
                        </ul>
                    </li>
                </ul>
                
            </div>
        </div>
    </nav>

    <?php
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] != 'customer') {
                header("location: ../auth/login.php");
            } 
        } else {
            header("location: ../auth/login.php");
        }
        ?>