<?php
function rupiah($angka)
{

    $result = "Rp " . number_format($angka, 2, ',', '.');
    return $result;
}
