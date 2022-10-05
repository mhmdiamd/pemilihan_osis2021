<?php
    include "koneksi.php";

    $nm_dpt = $_POST['nm_dpt'];
    $sql = "SELECT * FROM dpt INNER JOIN kelas ON kelas.id_kelas = dpt.id_kelas WHERE (nm_dpt LIKE '%$nm_dpt%' AND status = '0') ";
    $eksekusi = mysqli_query($konek, $sql);
    $nomor = 1;
?>

<!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <!-- Bootstrap -->
	 <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

	<!-- Font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<style>
		.table-dpt{
			min-width:100%;
			margin:0;
		}
		.table{
			background:#ffffff;
		}
	</style>

 	<title>	DPT ALL</title>
 </head>
 <body class="bg-light">

	<div class="container">
		<div class="row mt-3 mb-3">
			<div class="col-12 text-center">
				<h1>Daftar Pemilih Tetap (DPT)  <br>
				Pemilihan Osis SMK Al Amanah Tahun 2021/2022</h1>
				</div>
		</div>

		<div class="row">
			<div class="row table-dpt">
				<div class="col-12">
					<table class="table table-dpt">
						<thead class="thead-dark">
							<tr>
								<th><a class="btn btn-primary" href="dpt_all.php" role="button"><i class="fas fa-chevron-left"></i> Kembali</a></th>
								<th colspan='5'>
									<form action="dpt_search.php" method="POST">
										<div class="input-group ml-auto mb-2 w-50">
											<input type="text" name='nm_dpt' class="form-control" id="inlineFormInputGroup" placeholder="Cari Siswa">
                                            <div class="input-group-prepend">
												<button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                            
										</div>
									</form>
								</th>
							</tr>
							<tr>
								<th scope="col" class="text-center">No</th>
								<th scope="col" class="text-center">NIS</th>
								<th scope="col">Nama</th>
								<th scope="col" class="text-center">Kelas</th>
								<th scope="col" class="text-center">Status</th>
								<th scope="col" class="text-center">Operasi</th>
							</tr>
						</thead>

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
							<tbody>
								<tr>
									<th class="text-center"><?php echo $nomor++;?></th>
									<th class="text-center"><?php echo $data['id_dpt']?></th>
									<td><?php echo $data['nm_dpt']?></td>
									<td class="text-center"><?php echo $data['nm_kelas']?></td>
									<?php
										if($data['status'] == 0){
											echo "<td class='bg-danger text-center font-weight-bold'>".$status_pilih."</td>";;
										}elseif($data['status'] == 1){
											echo "<td class='bg-success text-center font-weight-bold'>".$status_pilih."</td>";
										}else{
											echo "<td class='bg-primary text-center font-weight-bold'>".$status_pilih."</td>";
										}
									?>
									<?php
										if($data['status'] == 0){
											echo  "<td class='text-center'><a class='btn btn-primary' href='masuk_antrian.php?id_dpt=".$data['id_dpt']."'>Masuk Antrian <i class='fas fa-chevron-circle-right'></i></a></td>";
										}else{
											echo "<td class='text-center'>Sudah Memilih</td>";
										}
									?>
								</tr>
							</tbody>
							
						<?php } ?>

					</table>
				</div>
			</div>

		</div>

	 </div>


	<!-- Script Bootstrap -->
	<script src="bootstrap/js/jquery-3.5.1.slim.min.js"></script>
	<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
 </body>
 </html>