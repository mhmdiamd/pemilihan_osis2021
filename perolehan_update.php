<?php
    session_start();
    include "koneksi.php";

    $id_perolehan    = $_GET['id_perolehan'];
    $id_paslon       = $_GET['id_paslon'];

    $sql           = "select * from perolehan where id_perolehan = $id_perolehan";
    $eksekusi      = mysqli_query($konek,$sql);
    $data          = mysqli_fetch_array($eksekusi);
    $id_dpt        = $data['id_dpt'];

    $sql1           = "UPDATE `perolehan` SET `id_paslon` = '$id_paslon', `aktif` = '0' WHERE `id_perolehan` = $id_perolehan";
    $jalankan_sql1  = mysqli_query($konek,$sql1);
    // $data1 = mysqli_fetch_array($jalankan_sql1);


    $_SESSION['id_perolehan_sess'] =  $id_perolehan ;

    $sql1           = "UPDATE `dpt` SET `status` = '2' WHERE `id_dpt` = $id_dpt";
    $jalankan_sql1  = mysqli_query($konek,$sql1);

    header("location:pilihan_konfirmasi.php");
?>