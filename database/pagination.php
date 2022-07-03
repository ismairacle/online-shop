<?php

require_once("database.php");


class pagination
{
    // no, halaman, previous, total_halaman, next
    public $no = 1;
    public $halaman, $prev, $total_halaman, $next;
    public $data;
    private $db;
    public function __construct()
    {
        $this->db = new database();
    }


    //mysql table pagination
    public function paginate_table($table, $batas)
    {
        $result = $this->db->select($table, "*");
        $this->halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
        $halaman_awal = ($this->halaman > 1) ? ($this->halaman * $batas) - $batas : 0;

        $this->previous = $this->halaman - 1;
        $this->next = $this->halaman + 1;

        $jumlah_data = mysqli_num_rows($result);
        $this->total_halaman = ceil($jumlah_data / $batas);

        $this->no = $halaman_awal + 1;
        return $this->db->select_limit($table, "*", $halaman_awal, $batas);
    

    }


    //array pagination
    public function paginate_data($data, $batas)
    {
        $this->halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
        $halaman_awal = ($this->halaman > 1) ? ($this->halaman * $batas) - $batas : 0;

        $this->previous = $this->halaman - 1;
        $this->next = $this->halaman + 1;

        $this->total_halaman = ceil((sizeof($data)) / $batas);

        $this->no = $halaman_awal + 1;
        return array_slice($data, 0, $batas);
    }
}
