<?php
    session_start();
    
    include "koneksi.php";


    if(!empty($_SESSION['id_bilik_sess']))
    {
        $id_bilik = $_SESSION['id_bilik_sess'];
        $sql_perolehan  = "select * from perolehan inner join dpt on dpt.id_dpt = perolehan.id_dpt inner join kelas ON dpt.id_kelas = kelas.id_kelas where id_bilik = $id_bilik and aktif=1";
        $jalankan_sql   = mysqli_query($konek,$sql_perolehan);
        $ada_orang      = mysqli_num_rows($jalankan_sql);



        if($ada_orang>0)
        {
            $data = mysqli_fetch_array($jalankan_sql);
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
            .name-text{
                background:#ffa31a;
                box-shadow: 5px 5px #3399ff ;
                padding:5px 15px;
                border-radius:30px;
                color:#fff;
            }
            .card{
                height:max-content !important;
            }
            .row-content{
                margin-bottom:-30px;
                background:#ffa31a;
            }
            .btn{
                background:#ffa31a;
                color:#fff;
                width:50%;
                border: 3px solid #3399ff;
                font-weight:500;
                letter-spacing:1px;
            }
            .card{
                box-shadow:8px -8px #3399ff;
            }
        </style>
        <title>Pilih Paslon</title>
    </head>
    <body>

   <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
  Launch static backdrop modal
</button>    -->

<!-- Modal -->
<div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center w-100" id="staticBackdropLabel">Selamat Datang</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
      <div class="row">
            <div class="col-12 text-center mt-2">
                <h5><span class="name-text1"><?php echo $data['id_dpt'] ?> <br>  <?php echo $data['nm_dpt']?> <br>   <?php echo $data['nm_kelas']?></span></h5>
                <!-- <h5><span class="name-text"></span></h5> -->
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="m-auto btn btn-secondary" data-dismiss="modal">Siap Memilih</button>
      </div>
    </div>
  </div>
</div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center mt-2">
                    <h1 class="pb-2">Selamat Datang</h1>
                    <h2><span class="name-text"><?php echo $data['id_dpt'] ?> - <?php echo $data['nm_dpt']?></span></h2>
                </div>
            </div>
        </div>
        
        <svg class="mt-2" id="wave" style="transform:rotate(0deg); transition: 0.3s" viewBox="0 0 1440 130" version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0"><stop stop-color="rgba(255, 163, 26, 1)" offset="0%"></stop><stop stop-color="rgba(255, 163, 26, 1)" offset="100%"></stop></linearGradient></defs><path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)" d="M0,78L17.1,84.5C34.3,91,69,104,103,93.2C137.1,82,171,48,206,41.2C240,35,274,56,309,73.7C342.9,91,377,104,411,97.5C445.7,91,480,65,514,47.7C548.6,30,583,22,617,32.5C651.4,43,686,74,720,88.8C754.3,104,789,104,823,97.5C857.1,91,891,78,926,78C960,78,994,91,1029,91C1062.9,91,1097,78,1131,75.8C1165.7,74,1200,82,1234,80.2C1268.6,78,1303,65,1337,62.8C1371.4,61,1406,69,1440,67.2C1474.3,65,1509,52,1543,52C1577.1,52,1611,65,1646,75.8C1680,87,1714,95,1749,93.2C1782.9,91,1817,78,1851,67.2C1885.7,56,1920,48,1954,45.5C1988.6,43,2023,48,2057,49.8C2091.4,52,2126,52,2160,43.3C2194.3,35,2229,17,2263,10.8C2297.1,4,2331,9,2366,19.5C2400,30,2434,48,2451,56.3L2468.6,65L2468.6,130L2451.4,130C2434.3,130,2400,130,2366,130C2331.4,130,2297,130,2263,130C2228.6,130,2194,130,2160,130C2125.7,130,2091,130,2057,130C2022.9,130,1989,130,1954,130C1920,130,1886,130,1851,130C1817.1,130,1783,130,1749,130C1714.3,130,1680,130,1646,130C1611.4,130,1577,130,1543,130C1508.6,130,1474,130,1440,130C1405.7,130,1371,130,1337,130C1302.9,130,1269,130,1234,130C1200,130,1166,130,1131,130C1097.1,130,1063,130,1029,130C994.3,130,960,130,926,130C891.4,130,857,130,823,130C788.6,130,754,130,720,130C685.7,130,651,130,617,130C582.9,130,549,130,514,130C480,130,446,130,411,130C377.1,130,343,130,309,130C274.3,130,240,130,206,130C171.4,130,137,130,103,130C68.6,130,34,130,17,130L0,130Z"></path></svg>

        <div class="container-fluid">
            <?php 
                $id_perolehan = $data['id_perolehan'];
                $sql_paslon  = "select * from paslon";
                $eks_sql_paslon   = mysqli_query($konek,$sql_paslon);
            ?> 

            <div class="row row-content pb-5">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 text-light text-center mb-3">
                            <h3>Calon Ketua OSIS SMK Al Amanah </h3>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                            while($data_paslon = mysqli_fetch_array($eks_sql_paslon)){
                            if($data_paslon['id_paslon'] != 1)
                            {
                                $id_paslon   = $data_paslon['id_paslon'];
                            ?>
                                <div class="col-md-3 d-flex justify-content-center">
                                    <div class="card" style="width: 18rem;">
                                        <img class="foto-paslon" src="img/<?php echo $data_paslon['gambar'];?>" class="card-img-top" alt="...">
                                        <div class="card-body text-center">
                                            <h5 class="card-title"><?php echo $data_paslon['nm_paslon']?></h5>
                                            <?php echo  "<a class='btn' href='perolehan_update.php?id_perolehan=".$id_perolehan."&id_paslon=".$id_paslon."'  onclick='return confirm(`Pilihan anda akan menetukan arah kepemimpinan OSIS di masa mendatang. Pilihan anda tidak dapat diulangi kembali. Apakah anda sudah yakin akan Pilihan anda?`)'>PIlih</a>";?>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                        <?php }?>
                    </div>
                </div>
            </div>
                <?php } else{
                        header("location:bilik_awal.php");
                    }
                }else{
                    header("location:bilik_login.php");
                }
                ?> 

        </div>

        
    <!-- Script Bootstrap -->
    <script src="bootstrap/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
            $('#myModal').modal('show')
        </script>
    </body>
</html>


            
