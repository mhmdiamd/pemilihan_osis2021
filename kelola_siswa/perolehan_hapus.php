<?php 
    include "../koneksi.php";

    $id_perolehan_get =$_GET['id_perolehan'];
    
    $sql1 = "SELECT * FROM perolehan as prlh INNER JOIN dpt as dp ON prlh.id_dpt = dp.id_dpt WHERE id_perolehan= '$id_perolehan_get' ";
    $eksekusi1 = mysqli_query($konek, $sql1);
    $data = mysqli_fetch_array($eksekusi1);
    $id_perolehan1 = $data['id_dpt'];

    $sql = "DELETE FROM perolehan WHERE id_perolehan = '$id_perolehan_get' ";
    $eksekusi = mysqli_query($konek, $sql);

    $sql2 = "UPDATE dpt SET dpt.status = '0'  WHERE id_dpt = '$id_perolehan1' ";
    $eksekusi2 = mysqli_query($konek, $sql2);

    if($eksekusi){
        header("location:perolehan_show.php");
    }else{
        echo "data gagal dihapus";
    }
?>