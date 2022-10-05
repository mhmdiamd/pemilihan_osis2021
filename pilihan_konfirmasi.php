<?php
    session_start();
    include "koneksi.php";
    $id_perolehan_get = $_SESSION['id_perolehan_sess'];

    $sql = "SELECT * FROM perolehan as prlh INNER JOIN dpt as dp ON prlh.id_dpt = dp.id_dpt WHERE id_perolehan = '$id_perolehan_get' ";
    $eksekusi = mysqli_query($konek, $sql);
    $data = mysqli_fetch_array($eksekusi);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Bootstrap -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

	 <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> -->

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .container{
            height : 100vh;
            margin-bottom:-30px;
        }
        .container{
            min-width:90%;
        }
        svg.svg2{
            position:absolute;
            z-index: 100;
        }
        svg.svg1{
            position: absolute;
            bottom:0;
        }
        /* @media Query (Responsive) */
        @media only screen and (max-width:960px){
            .image-welcome img{
                display:none
            }
            svg.svg2{
            position:static;
            }
            svg.svg1{
                position: static;
            }
        }
    </style>

    <title>PIlihan Konfirmasi</title>
</head>
<body>

    <svg class="svg2" id="wave" style="transform:rotate(180deg); transition: 0.3s" viewBox="0 0 1440 150" version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0"><stop stop-color="rgba(255, 163, 26, 1)" offset="0%"></stop><stop stop-color="rgba(255, 163, 26, 1)" offset="100%"></stop></linearGradient></defs><path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)" d="M0,135L24,115C48,95,96,55,144,35C192,15,240,15,288,17.5C336,20,384,25,432,32.5C480,40,528,50,576,62.5C624,75,672,90,720,97.5C768,105,816,105,864,95C912,85,960,65,1008,70C1056,75,1104,105,1152,115C1200,125,1248,115,1296,92.5C1344,70,1392,35,1440,22.5C1488,10,1536,20,1584,32.5C1632,45,1680,60,1728,77.5C1776,95,1824,115,1872,110C1920,105,1968,75,2016,70C2064,65,2112,85,2160,100C2208,115,2256,125,2304,115C2352,105,2400,75,2448,67.5C2496,60,2544,75,2592,87.5C2640,100,2688,110,2736,110C2784,110,2832,100,2880,80C2928,60,2976,30,3024,37.5C3072,45,3120,90,3168,102.5C3216,115,3264,95,3312,90C3360,85,3408,95,3432,100L3456,105L3456,150L3432,150C3408,150,3360,150,3312,150C3264,150,3216,150,3168,150C3120,150,3072,150,3024,150C2976,150,2928,150,2880,150C2832,150,2784,150,2736,150C2688,150,2640,150,2592,150C2544,150,2496,150,2448,150C2400,150,2352,150,2304,150C2256,150,2208,150,2160,150C2112,150,2064,150,2016,150C1968,150,1920,150,1872,150C1824,150,1776,150,1728,150C1680,150,1632,150,1584,150C1536,150,1488,150,1440,150C1392,150,1344,150,1296,150C1248,150,1200,150,1152,150C1104,150,1056,150,1008,150C960,150,912,150,864,150C816,150,768,150,720,150C672,150,624,150,576,150C528,150,480,150,432,150C384,150,336,150,288,150C240,150,192,150,144,150C96,150,48,150,24,150L0,150Z"></path></svg>

    <div class="container">
        <div class="row h-100 d-flex justify-content-center">
            <div class="col col-6 h-100 d-flex justify-content-center flex-column text-center">
                <h1>Terimakasih <br> <span class="bg-danger text-light px-4">  <?php echo $data['nm_dpt'] ?> </span><br> Sudah Memilih</h1>
                <h5>Tekan Tombol <span class="bg-primary px-2 text-light">Selesai</span> untuk menyelesaikan pilihan</h5>
                <a href="bilik_awal.php" class="btn w-50 btn-primary mx-auto mt-2">SELESAI</a>
            </div>
        </div>
    </div>


    <svg class="svg1" id="wave" style="transform:rotate(0deg); transition: 0.3s" viewBox="0 0 1440 150" version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0"><stop stop-color="rgba(255, 163, 26, 1)" offset="0%"></stop><stop stop-color="rgba(255, 163, 26, 1)" offset="100%"></stop></linearGradient></defs><path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)" d="M0,135L24,115C48,95,96,55,144,35C192,15,240,15,288,17.5C336,20,384,25,432,32.5C480,40,528,50,576,62.5C624,75,672,90,720,97.5C768,105,816,105,864,95C912,85,960,65,1008,70C1056,75,1104,105,1152,115C1200,125,1248,115,1296,92.5C1344,70,1392,35,1440,22.5C1488,10,1536,20,1584,32.5C1632,45,1680,60,1728,77.5C1776,95,1824,115,1872,110C1920,105,1968,75,2016,70C2064,65,2112,85,2160,100C2208,115,2256,125,2304,115C2352,105,2400,75,2448,67.5C2496,60,2544,75,2592,87.5C2640,100,2688,110,2736,110C2784,110,2832,100,2880,80C2928,60,2976,30,3024,37.5C3072,45,3120,90,3168,102.5C3216,115,3264,95,3312,90C3360,85,3408,95,3432,100L3456,105L3456,150L3432,150C3408,150,3360,150,3312,150C3264,150,3216,150,3168,150C3120,150,3072,150,3024,150C2976,150,2928,150,2880,150C2832,150,2784,150,2736,150C2688,150,2640,150,2592,150C2544,150,2496,150,2448,150C2400,150,2352,150,2304,150C2256,150,2208,150,2160,150C2112,150,2064,150,2016,150C1968,150,1920,150,1872,150C1824,150,1776,150,1728,150C1680,150,1632,150,1584,150C1536,150,1488,150,1440,150C1392,150,1344,150,1296,150C1248,150,1200,150,1152,150C1104,150,1056,150,1008,150C960,150,912,150,864,150C816,150,768,150,720,150C672,150,624,150,576,150C528,150,480,150,432,150C384,150,336,150,288,150C240,150,192,150,144,150C96,150,48,150,24,150L0,150Z"></path></svg>

    


<!-- Script Bootstrap -->
<script src="bootstrap/js/jquery-3.5.1.slim.min.js"></script>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
    