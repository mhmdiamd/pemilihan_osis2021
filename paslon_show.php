<?php 

    session_start();
    include "koneksi.php";

    if(empty($_SESSION['id_bilik_sess'])){
        header("location:bilik_login.php");
    }else{?>

<?php
    $sql = "SELECT * FROM paslon WHERE id_paslon != 1";
    $eksekusi = mysqli_query($konek, $sql);
  ?>

<!DOCTYPE HTML>
<html>
<head>

    <!-- Bootstrap -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> -->

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title> Admin - Persentase Suara</title>

<script>
    window.onload = function() {

    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title: {
            text: "Persentase banyak suara yang didapatkan setiap calon"
        },
        data: [{
            type: "pie",
            startAngle: 240,
            yValueFormatString: "##0.00\"%\"",
            indexLabel: "{label} {y}",
            dataPoints: [

                <?php 
                    while($data = mysqli_fetch_array($eksekusi))
                    {
                        $id_paslon = $data['id_paslon']; 
                        $sql2          = "select * from perolehan where id_paslon = $id_paslon";
                        $jalankan_sql2 = mysqli_query($konek,$sql2);
                        $jumlah        = mysqli_num_rows($jalankan_sql2);

                        $sql3          = "select * from perolehan";
                        $jalankan_sql3 = mysqli_query($konek,$sql3);
                        $jumlah_data_all        = mysqli_num_rows($jalankan_sql3);

                        $presentase = $jumlah / $jumlah_data_all * 100;
                    ?>
                        {y: <?php echo $presentase;?>, label: "<?php echo $data['nm_paslon']; ?>"},
                    <?php }?>
            ]
        }]
    });
    chart.render();

    }
</script>

<style>
    .ikon-kelola i.fas{
        font-size:3em;
        color:#3399ff;
        text-shadow: 3px 1px #ffa31a;
        border-radius:100%;
    }
    .ikon-kelola{
        position:fixed;
        right:20px;
        top:20px;
    }
    .card{
        background-color: #ffa31a;
        color: #fff;
        box-shadow: 5px 5px #3399ff;
        border: none;
    }
    .card-header{
        background-color: #3399ff;
    }
    .row-suara .suara1{
        background-color: #fff;
        box-shadow: 0 0 10px #555;
        border-radius: 0 50px 0 0;
    }
    .row-suara{
        color: #ffa31a;
    }
    #chartContainer{
        box-shadow:0 0 10px #555; ;
    }

</style>
</head>
<body class="bg-light">



        <div class="container">
            <div class="row mt-5 mb-4">
                <div class="col-md-4 ">
                    <?php 
                        $sql_dpt = "SELECT * FROM dpt";
                        $eks_sql_dpt = mysqli_query($konek,$sql_dpt);
                        $total_data  = mysqli_num_rows($eks_sql_dpt);
                    ?>
                    <div class="card text-center mb-3" style="min-width: 15rem;">
                        <div class="card-header"><h5>Jumlah DPT</h5></div>
                        <div class="card-body">
                            <h2 class="card-title"><?php echo $total_data ?></h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <?php 
                        $sql_dpt1 = "SELECT * FROM perolehan";
                        $eks_sql_dpt1 = mysqli_query($konek,$sql_dpt1);
                        $total_data1  = mysqli_num_rows($eks_sql_dpt1);
                    ?>
                    <div class="card text-center mb-3" style="min-width: 15rem;">
                        <div class="card-header"><h5>Jumlah DPT yang Sudah Memilih</h5></div>
                        <div class="card-body">
                            <h2 class="card-title"><?php echo $total_data1 ?></h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <?php 
                        $total_data2  = $total_data - $total_data1;
                    ?>
                    <div class="card text-center mb-3" style="min-width: 15rem;">
                        <div class="card-header"><h5>Siswa yang Belum Memilih</h5></div>
                        <div class="card-body">
                            <h2 class="card-title"><?php echo $total_data2 ?></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-suara d-flex justify-conten-between">
                <div class="col-md-6 suara1  pt-3 pb-3">
                    <div class="row mt-2">
                        <div class="col-12 text-center">
                            <h4>Banyak Suara masing masing Calon</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-suara pt-3 d-flex flex-wrap justify-content-around">
                        <?php
                        foreach ($eksekusi as $data_paslon )
                        {
                            $id_paslon = $data_paslon['id_paslon']; 
                            $sql3          = "select * from perolehan where id_paslon = $id_paslon";
                            $jalankan_sql3 = mysqli_query($konek,$sql3);
                            $jumlah1        = mysqli_num_rows($jalankan_sql3);
                        ?>
                            <div class="card text-center mb-3" style="min-width: 15rem;">
                                <div class="card-header"><h6><?php echo $data_paslon['nm_paslon']?></h6></div>
                                <div class="card-body">
                                    <h2 class="card-title"><?php echo $jumlah1?></h2>
                                </div>
                            </div>
                    <?php }?>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div id="chartContainer" style="height: 100%; width: 100%;"></div>
                </div>
            </div>
        </div>

        <div class="ikon-kelola">
            <a href="kelola_siswa/perolehan_show.php"><i class="fas fa-user-cog"></i></a>
        </div>


<!-- Script Bootstrap -->
<script src="bootstrap/js/jquery-3.5.1.slim.min.js"></script>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Canvas -->
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>
<?php }?>