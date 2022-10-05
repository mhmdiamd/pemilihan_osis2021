<?php 	
	include "koneksi.php";

	$sql = "SELECT * FROM dpt INNER JOIN kelas ON kelas.id_kelas = dpt.id_kelas";
	$eksekusi = mysqli_query($konek, $sql);

	$sql2 = "SELECT * FROM bilik";
	$eksekusi2 = mysqli_query($konek, $sql2);

	$nomor = 1;

?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
	 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- bootstrap CSS -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

	<!-- Font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

	<style>
		 .container{
            min-width:90%;
            background-color: #ffffff;
            box-shadow: 0 0 10px #555;
            border-radius: 70px 70px 0 0;
        }
        .row-heading{
            border-radius: 70px 70px 0 0;
        }
		.table{
			background:#ffffff;
		}
	</style>

 	<title>	DPT ALL</title>
 </head>
 <body class="bg-light">

	<div class="container pb-3">

		<div class="row row-heading bg-dark text-light mt-3 mb-3">
			<div class="col-12 text-center">
				<h1>Daftar Pemilih Tetap (DPT)  <br>
				Pemilihan Osis SMK Al Amanah Tahun 2021/2022</h1>
				</div>
		</div>

		<div class="row">
			<div class="col-12">
				<table id="example" class="table display" style="min-width:100%">
					<thead class="thead-dark">
						<tr>
							<th scope="col" class="text-center">No</th>
							<th scope="col" class="text-center">NIS</th>
							<th scope="col">Nama</th>
							<th scope="col" class="text-center">Kelas</th>
							<th scope="col" class="text-center">Status</th>
							<th scope="col" class="text-center">Operasi</th>
						</tr>
					</thead>
					
					<tbody>
						<?php 
							while($data = mysqli_fetch_array($eksekusi))
							{
								if($data['status'] == 0){
										$status_pilih = "belum Memilih";
								}elseif($data['status'] == 1){
									$status_pilih = "sedang di bilik suara";
								}else{
									$status_pilih = "sudah memilih";
								}
							?>
						<tr>
							<th class="text-center"><?php echo $nomor++;?></th>
							<th class="text-center"><?php echo $data['id_dpt']?></th>
							<td><?php echo $data['nm_dpt']?></td>
							<td class="text-center"><?php echo $data['nm_kelas']?></td>
							<?php
								if($data['status'] == 0){?>
									<td class='bg-danger text-center font-weight-bold border'><?php echo $status_pilih ?></td>
								<?php }elseif($data['status'] == 1){?>
									<td class='bg-success text-center font-weight-bold'><?php echo $status_pilih ?></td>
								<?php }else{?>
									<td class='bg-primary text-center font-weight-bold'><?php echo $status_pilih ?></td>
								<?php } ?>
							<?php
								if($data['status'] == 0){?>
									<td class="text-center">
										<a class="btn btn-primary" href="masuk_antrian.php?id_dpt=<?php echo $data['id_dpt']?>">Masuk Antrian <i class='fas fa-chevron-circle-right'></i></a></td>
								<?php }else{ ?>
									<td class='text-center'>Sudah Memilih</td>
								<?php }?>
							
						</tr>
						<?php } ?>
					</tbody>
					
					<tfoot>
						<tr>
							<th scope="col" class="text-center">No</th>
							<th scope="col" class="text-center">NIS</th>
							<th scope="col">Nama</th>
							<th scope="col" class="text-center">Kelas</th>
							<th scope="col" class="text-center">Status</th>
							<th scope="col" class="text-center">Operasi</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>

	</div>

 	


<!-- Data Table CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

<!-- Data Table -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
	
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
	
	<!-- Script Bootstrap -->
	<!-- <script src="bootstrap/js/jquery-3.5.1.slim.min.js"></script> -->
	<!-- <script src="bootstrap/js/bootstrap.bundle.min.js"></script> -->
	
 </body>
 </html>