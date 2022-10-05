<?php
    session_start(); 
	include "../koneksi.php";

    if(empty($_SESSION['id_bilik_sess'])){
        header("location:../bilik_login.php");
    }else{?>

    <?php
    // $sql = "SELECT * FROM paslon";
    // $eksekusi = mysqli_query($konek, $sql);

	$sql1 = "SELECT * FROM perolehan INNER JOIN dpt ON perolehan.id_dpt = dpt.id_dpt INNER JOIN kelas ON dpt.id_kelas = kelas.id_kelas INNER JOIN paslon ON perolehan.id_paslon = paslon.id_paslon";
	$eksekusi1 = mysqli_query($konek, $sql1);

	$nomor = 1;
 ?>




 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <!-- Bootstrap -->
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

	 <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> -->

    <!-- Data Table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <!-- Data Table -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

	<!-- Font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style>
        .container{
            background-color: #fff;
            box-shadow: 0 0 10px #555;
            border-radius: 50px 50px 0 0;
        }
        .row-heading{
            border-radius: 50px 50px 0 0;
        }
	</style>

 	<title>	Admin - Kelola DPT</title>
 </head>
 <body class="bg-light">

	<div class="container pb-3">
		<div class="row row-heading bg-dark text-light mt-3 mb-2">
			<div class="col-12 text-center">
				<h1>Kelola DPT</h1>
			</div>
        </div>
        <div class="row">
            <div class="col-12">
                <table id="example" class="table display" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col" class="text-center">NIS</th>
                            <th scope="col">Nama</th>
                            <th scope="col" class="text-center">Kelas</th>
                            <!-- <th scope="col" class="text-center">Calon Pilihan</th> -->
                            <th scope="col" class="text-center">Operasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($data = mysqli_fetch_array($eksekusi1))
                            {?>
                            <tr>
                                <th class="text-center"><?php echo $nomor++;?></th>
                                <th class="text-center"><?php echo $data['id_dpt']?></th>
                                <td><?php echo $data['nm_dpt']?></td>
                                <td class="text-center"><?php echo $data['nm_kelas']?></td>
                                <!-- <td class="text-center">
                                    /<?php // echo $data['nm_paslon']?>
                                </td> -->
                                <td class="text-center">
                                    <!-- <a href="perolehan_form_ubah.php?id_perolehan=<?php echo $data['id_perolehan']?>" > <i class="fas fa-user-edit"></i> </a> |  -->
                                    <a href="perolehan_hapus.php?id_perolehan=<?php echo $data['id_perolehan']?>" onclick="return confirm('Apakah anda yakin ingin menghapus data <?php echo $data['nm_dpt']?>?')"> <i class="fas fa-trash-alt"></i> </a> 
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col" class="text-center">NIS</th>
                            <th scope="col">Nama</th>
                            <th scope="col" class="text-center">Kelas</th>
                            <!-- <th scope="col" class="text-center">Status</th> -->
                            <th scope="col" class="text-center">Operasi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

   

	
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
	
<!-- Script Bootstrap -->
<!-- <script src="../bootstrap/js/jquery-3.5.1.slim.min.js"></script>
<script src="../bootstrap/js/bootstrap.bundle.min.js"></script> -->
 </body>
 </html>
 <?php } ?>