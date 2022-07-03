<?php

use LDAP\Result;

class database
{
    public $que;
    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'toko_online';
    private $result = array();
    private $mysqli = '';

    public function __construct()
    {
        $this->mysqli = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    }

    public function insert($table, $para = array())
    {
        $table_columns = implode(',', array_keys($para));
        $table_value = implode("','", $para);

        $sql = "INSERT INTO $table($table_columns) VALUES('$table_value')";

        return $this->mysqli->query($sql);
    }

    public function update($table, $para = array(), $condition)
    {
        $args = array();

        foreach ($para as $key => $value) {
            $args[] = "$key = '$value'";
        }

        $sql = "UPDATE  $table SET " . implode(', ', $args) . " WHERE $condition ";

        $this->mysqli->query($sql);

        return $sql;
    }

    public function delete($table, $condition)
    {
        $sql = "DELETE FROM $table WHERE $condition";
        return $this->mysqli->query($sql);
    }

    public $sql;

    public function select($table, $rows = "*", $where = null)
    {
        if ($where != null) {
            $sql = "SELECT $rows FROM $table WHERE $where";
        } else {
            $sql = "SELECT $rows FROM $table";
        }

        return $this->mysqli->query($sql);
    }

    public function select_limit($table, $rows = "*", $fpage, $limit, $desc = false, $where = null)
    {

        $sql = "SELECT $rows FROM $table limit $fpage, $limit";
        if ($desc == true) {
            $sql = "SELECT $rows FROM $table  ORDER BY id DESC LIMIT $fpage, $limit";
        }
        if ($where != null) {
            $sql = "SELECT $rows FROM $table WHERE $where limit $fpage, $limit";
        }
        return $this->mysqli->query($sql);
    }

    public function cek_promo($id_produk)
    {
        $sql = "SELECT pr_nama, pr_potongan, pr_mulai, pr_selesai, p_nama, DATEDIFF(now(), pr_mulai) AS date_diff FROM promo 
            LEFT JOIN promo_produk ON promo.id = promo_produk.id_promo 
            LEFT JOIN produk ON promo_produk.id_produk = produk.id 
            WHERE produk.id = $id_produk && pr_mulai <= now() && pr_selesai >= now()
            ORDER BY date_diff";
        $result = mysqli_fetch_assoc($this->mysqli->query($sql));
        if (isset($result)) {
            return $result = intval($result['pr_potongan']);
        } else {
            return 0;
        }
    }

    public function get_all_promo()
    {
        $sql = "SELECT pr_nama, pr_potongan, pr_mulai, pr_selesai, p_nama, p_harga, p_photo, produk.id as produk_id, DATEDIFF(now(), pr_mulai) AS date_diff FROM promo 
        LEFT JOIN promo_produk ON promo.id = promo_produk.id_promo 
        LEFT JOIN produk ON promo_produk.id_produk = produk.id";
    }


    public function get_promo_products($all = false)
    {
        if ($all == true) {
            $sql = "SELECT pr_nama, pr_potongan, pr_mulai, pr_selesai, p_nama, p_harga, p_photo, produk.id as produk_id, DATEDIFF(now(), pr_mulai) AS date_diff FROM promo 
            LEFT JOIN promo_produk ON promo.id = promo_produk.id_promo 
            LEFT JOIN produk ON promo_produk.id_produk = produk.id";
        } else {
            $sql = "SELECT pr_nama, pr_potongan, pr_mulai, pr_selesai, p_nama, p_harga, p_photo, produk.id as produk_id, DATEDIFF(now(), pr_mulai) AS date_diff FROM promo 
            LEFT JOIN promo_produk ON promo.id = promo_produk.id_promo 
            LEFT JOIN produk ON promo_produk.id_produk = produk.id 
            WHERE pr_mulai <= now() && pr_selesai >= now()
            ORDER BY date_diff";
        }

        return $this->mysqli->query($sql);
    }

    public function search_product($query)
    {
        $sql = "SELECT * FROM `produk` WHERE `p_nama` LIKE '%$query%'";
        return $this->mysqli->query($sql);
    }


    public function __destruct()
    {
        $this->mysqli->close();
    }
}
