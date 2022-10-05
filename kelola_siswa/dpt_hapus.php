<?php 
    include "../koneksi.php";

    $id_dpt_get =$_GET['id_dpt'];

    $sql2 = "UPDATE dpt SET dpt.status = '0'  WHERE id_dpt = '$id_dpt_get' ";
    $eksekusi2 = mysqli_query($konek, $sql2);



    if($eksekusi2){
        header("location:dpt_status.php");
    }else{
        echo "data gagal dihapus";
    }
?>