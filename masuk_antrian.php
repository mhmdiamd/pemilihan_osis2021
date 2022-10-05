<?php 
    include "koneksi.php";
    $id_dpt = $_GET['id_dpt'];

    // date_default_timezone_set('Asia/Jakarta');
    // $waktu = date("Y-m-d H:i:s");
    $sql1 = "SELECT * FROM dpt ORDER BY antrian DESC";
    $eksekusi1 = mysqli_query($konek, $sql1);
    $data = mysqli_fetch_array($eksekusi1);

    $antrian = $data['antrian'];
    $antrian_terkini = $antrian+1;

    $sql = "UPDATE `dpt` SET `status` = '3', `antrian` = '$antrian_terkini' WHERE `dpt`.`id_dpt` = '$id_dpt' ";
    $eksekusi = mysqli_query($konek, $sql);
    header("location:dpt_all.php");

?>