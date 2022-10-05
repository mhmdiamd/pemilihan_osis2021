<?php
    session_start();
    include "koneksi.php";
    echo "<br>";

    $sql = "SELECT *, dpt.id_dpt id_dpt2 FROM dpt 
    INNER JOIN kelas ON dpt.id_kelas = kelas.id_kelas 
    left outer JOIN perolehan on dpt.id_dpt = perolehan.id_dpt
    left outer JOIN bilik ON bilik.id_bilik = perolehan.id_bilik 
    WHERE (dpt.status = '3' OR dpt.status = '1' ) ORDER BY antrian ASC";
    $eksekusi = mysqli_query($konek, $sql);

    $sql2 = "SELECT * FROM bilik ";
    $eksekusi2 = mysqli_query($konek, $sql2);

    $nomor = 1;
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

    <!-- Data Table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <!-- Data Table -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <!-- Data Table -->

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .container{
            min-width:90%;
            background-color: #ffffff;
            box-shadow: 0 0 10px light;
            border-radius: 70px 70px 0 0;
        }
        .row-heading{
            border-radius: 70px 70px 0 0;
        }
		.table-dpt{
			min-width:100%;
			margin:0;
		}
		.table{
			background:#ffffff;
		}
	</style>

    <title>Tampilan Antrian</title>
</head>
<body class="bg-light">

        <?php 
               if(empty($_GET['notif'])){
                // $notif = "";
            ?><?php } else{
                $notif = $_GET['notif'];
            ?>
                <script>
                    alert("<?php echo $notif;?>")
                </script>
            <?php } ?>
        
    

    <div class="container pb-3">
		<div class="row row-heading mb-3 bg-dark text-light">
			<div class="col-12 text-center">
            <h1>Antrian Daftar Pemilih Tetap (DPT)  <br>
				Pemilihan Osis SMK Al Amanah Tahun 2021/2022</h1>
            </div>
        </div>

        <div class="row">
			<div class="row table-dpt">
				<div class="col-12">

                    <table id="example" class="table display">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">NIS</th>
                                <th scope="col">Nama</th>
                                <th scope="col" class="text-center">Kelas</th>
                                <th scope="col" class="text-center">No Urut</th>
                                <th scope="col" class="text-center">Status</th>   
                                <?php 
                                    while($data2 = mysqli_fetch_array($eksekusi2)){?>
                                        <th scope="col" class="text-center"><?php echo $data2['nm_bilik']?></th>
                                <?php }?>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php 
                                while($data = mysqli_fetch_array($eksekusi)){
                                    $sql3 = "SELECT * FROM bilik";
                                    $eksekusi3 = mysqli_query($konek, $sql3);

                                    if($data['status'] == 3 ){
                                        $status_pilih = "Belum Masuk Bilik";
                                    }else if($data['status'] == 1 ){
                                        $status_pilih = "Sedang di dalam ".$data['nm_bilik'];
                                    }else{
                                        $status_pilih = "Sudah memilih";
                                    }
                                ?>
                                <tr>
                                    <th class="text-center"><?php echo $nomor++;?></th>
                                    <th class="text-center"><?php echo $data['id_dpt2']?></th>
                                    <td><?php echo $data['nm_dpt']?></td>
                                    <td class="text-center"><?php echo $data['nm_kelas']?></td>
                                    <td class="text-center"><?php echo $data['antrian']?></td>

                                    <?php
                                        if($data['status'] == 0){?>
                                            <td class='bg-danger text-center font-weight-bold border'><?php echo $status_pilih ?></td>
                                       <?php } else if($data['status'] == 1){ ?>
                                            <td style="background-color: <?php echo $data['colour']?>;" class='text-center font-weight-bold'><?php echo $status_pilih ?></td>
                                       <?php }else {?>
                                            <td class='bg-danger text-light text-center font-weight-bold'><?php echo $status_pilih ?></td>
                                        <?php } ?>
                                    <?php 
                                        while($data3= mysqli_fetch_array($eksekusi3)){
                                           
                                            if($data['status'] == 3){?>
                                                <td class="text-center"><a class="btn btn-primary" href="tentukan_bilik.php?id_bilik=<?php echo $data3['id_bilik'] ?>&id_dpt=<?php echo $data['id_dpt2']?>"><?php echo $data3['nm_bilik']?> <i class='fas fa-chevron-circle-right'></i></a></td>
                                           <?php }else{
                                               ?> 
                                                <td class="text-center td_bilik"><?php echo $data3['nm_bilik'] ?></a></td>
                                            <?php } ?>
                                        <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>

                        <tfoot>
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">NIS</th>
                                <th scope="col">Nama</th>
                                <th scope="col" class="text-center">Kelas</th>
                                <th scope="col" class="text-center">No Urut</th>
                                <th scope="col" class="text-center">Status</th>
                                <th colspan="4" scope="col" class="text-center">Operasi</th>
                            </tr>
					    </tfoot>
                        
                    </table>

                </div>
            </div>
        </div>

    </div>



<script>
    $(document).ready(function() {
    $('#example').DataTable();
    } );
</script>

<!-- Script Bootstrap -->
<!-- <script src="bootstrap/js/jquery-3.5.1.slim.min.js"></script> -->
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>