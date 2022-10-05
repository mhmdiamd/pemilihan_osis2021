<?php
    session_start();
    include "koneksi.php";

    $id_dpt = $_GET['id_dpt'];
    $id_bilik = $_GET['id_bilik'];

    $sql = "SELECT * FROM perolehan inner join bilik on bilik.id_bilik = perolehan.id_bilik WHERE (perolehan.id_bilik = '$id_bilik' AND aktif='1')";
    $eksekusi = mysqli_query($konek, $sql);
    $jumlah_data = mysqli_num_rows($eksekusi);
    $data = mysqli_fetch_array($eksekusi);
    echo $nm_bilik = $data['nm_bilik'];
    

    if($jumlah_data > 0 ){
        header("location:dpt_tampil.php?notif=$nm_bilik sudah terisi");
    }else{
        
        $sql1 = "INSERT INTO perolehan (`id_perolehan`, `id_paslon`, `id_dpt`, `id_bilik`, `aktif`) VALUES (NULL, '1', '$id_dpt','$id_bilik','1')";
        $eksekusi1 = mysqli_query($konek, $sql1);

        $_SESSION['id_bilik_sess'] = $id_bilik;

        $sql2 = "UPDATE dpt SET status ='1' WHERE id_dpt = $id_dpt";
        $eksekusi2 = mysqli_query($konek, $sql2);

        header("location:dpt_tampil.php");

    }
?>