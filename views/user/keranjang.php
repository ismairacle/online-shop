<?php $active = 'keranjang' ?>

<?php include("layouts/header.php");
include("helpers.php");
include("../../database/database.php");

$id = $_SESSION['user_id'];
$db = new database();
$result = $db->select("customer", "*", "id = '$id'");
$user = mysqli_fetch_assoc($result);

?>


<!-- Section-->
<section class="py-5">
  <div class="container px-4 px-lg-5 p-5">
    <h2 class="fw-bolder mb-4">Keranjang Belanja</h2>
    <div class="row">



      <div class="col-md-8 pe-5">

        <?php

        if (isset($_SESSION['cart'])) {
          echo '<h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Barang</span>
        </h4>';

          $total = 0;
          foreach ($_SESSION['cart'] as $key => $p) {
            $price = $p['qty'] * $p['p_harga'];
            show_cart_card($key, $p['p_nama'], $p['p_brand'], $p['qty'], $price, $key);
            $total += $price;
          }
        } else {
          echo '<h4 class="text-center mt-5">
          <span class="text-muted">Keranjang kosong</span>

        </h4>';
        }
        ?>


      </div>



      <div class="col-md-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Data Pemesan</span>
          <span class="badge badge-secondary badge-pill">3</span>
        </h4>
        <ul class="list-group list-unstyled  mb-3">

          <li class="list-group-item">
            <div class="row">
              <div class="col-5"><small class="text-muted">Nama Lengkap</small></div>
              <div class="col-1"><small class="text-muted">:</small></div>
              <div class="col-6"><small class="fw-bold text-muted"><?= $user['cus_name'] ?></small></div>
            </div>
          </li>
          <li class="list-group-item">
            <div class="row">
              <div class="col-5"><small class="text-muted">Telepon</small></div>
              <div class="col-1"><small class="text-muted">:</small></div>
              <div class="col-6"><small class="fw-bold text-muted"><?= $user['cus_phone'] ?></small></div>
            </div>
          </li>
          <li class="list-group-item">
            <div class="row">
              <div class="col-5"><small class="text-muted">E-mail</small></div>
              <div class="col-1"><small class="text-muted">:</small></div>
              <div class="col-6"><small class="fw-bold text-muted"><?= $user['cus_email'] ?></small></div>
            </div>
          </li>
          <li class="list-group-item">
            <div class="row">
              <div class="col-5"><small class="text-muted">Alamat</small></div>
              <div class="col-1"><small class="text-muted">:</small></div>
              <div class="col-6"><small class="text-muted"><?= $user['cus_address'] ?></small></div>
            </div>
          </li>
          <li class="list-group-item">
            <div class="row">
              <div class="col-5"><small class="fw-bold text-muted">Total Belanja</small></div>
              <div class="col-1"><small class="fw-bold text-muted">:</small></div>
              <div class="col-6"><small class="fw-bold text-muted"><?php if (isset($total)) echo rupiah($total) ?></small></div>
            </div>
          </li>
          <li class="">
            <div class="row text-center mt-3">
              <?php if (isset($_SESSION['cart'])) {
                if (sizeof($_SESSION['cart']) > 0) {
                  echo '<div> <a href="../notification/success.php?cart_success=1" class="btn btn-dark my-2 px-4">Checkout</a>
                  ';
                }
              } ?>
            </div>
      </div>
      </li>

      </ul>
    </div>
  </div>

</section>
<?php include("layouts/footer.php"); ?>