<?php
    session_start();
   include "koneksi.php";
   $user_bilik = $_POST['user_bilik'];
   $pwd_bilik = md5($_POST['pwd_bilik']);

   $sql       = "select * from bilik where (nm_bilik = '$user_bilik') and (pwd = '$pwd_bilik')";
   $eksekusi  = mysqli_query($konek,$sql);
   $ketemu    = mysqli_num_rows($eksekusi);
   if($ketemu>0)
   {
       $data = mysqli_fetch_array($eksekusi);
       $id_bilik = $data['id_bilik'];
       $nm_bilik = $data['nm_bilik'];
       $_SESSION['id_bilik_sess'] = $id_bilik;
       $_SESSION['nm_bilik_sess'] = $nm_bilik;
       header("location:bilik_awal.php");
   }
   else
   {
       header("location:bilik_login.php");
       $_SESSION['notif'] = "Akun yang anda masukan salah!";
   }
?>