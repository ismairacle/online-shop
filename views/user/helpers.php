<?php

function show_products($nama, $harga, $id, $images)
{
    echo '
        <div class="col mb-5">
            <div class="card" >
                <div class="card-body p-3 text-center">            
                    <img class="img-fluid" src="'. $images .'" alt="... "/>
                </div>
                <div class="card-body p-4">
                    <div class="text-center ">
                        <h5 class="fw-bolder ">' . $nama . '</h5>
                        ' . rupiah($harga) . '
                    </div>
                </div>
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent ">
                    <div class="text-center "><a class="btn btn-outline-dark  mt-auto " href="detail.php?id=' . $id . '">Lihat Produk</a></div>
                </div>
            </div>
        </div>
        ';
}

function show_products_discount($nama, $harga, $harga_diskon, $id, $images)
{
    echo '
        <div class="col mb-5 ">
              <div class="card" >
                  <div class="card-body p-3 text-center">            
                    <img class="img-fluid" src="'. $images .'" alt="... "/>
                  </div>
                  <div class="card-body p-4 ">
                    <div class="text-center ">
                        <h5 class="fw-bolder ">' . $nama . '</h5>
                        <span class="text-muted text-decoration-line-through ">' . rupiah($harga) . '</span> <br>' . rupiah($harga_diskon) . '
                    </div>
                </div>
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent ">
                    <div class="text-center "><a class="btn btn-outline-dark  mt-auto " href="detail.php?id=' . $id . '">Lihat Produk</a></div>
                </div>
            </div>
        </div>
        ';
}

function rupiah($angka)
{

    $result = "Rp " . number_format($angka, 2, ',', '.');
    return $result;
}

function show_cart_card($id, $name, $brand, $qty, $price)
{
   echo ' <div class="card mb-3">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <div class="d-flex flex-row align-items-center">
          <div>
          </div>
          <div class="ms-3">
            <h5>'.$name . '</h5>
            <p class="small mb-0">'.$brand . '</p>
          </div>
        </div>
        <div class="d-flex flex-row align-items-center">
          <div style="width: 50px;">
            <h5 class="fw-normal mb-0">'.$qty . '</h5>
          </div>
          <div style="width: 150px;">
            <h5 class="mb-0">'.rupiah($price) . '</h5>
          </div>
          <div>
            <a href="proses_keranjang.php?delete='. $id . '" class="ms-3 btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
        </div>
        </div>
      </div>
    </div>
  </div>';
}