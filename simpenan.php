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
				<table id="example">
						<thead>
							<!-- <tr>
								<th colspan='6'>
									<form action="dpt_search.php" method="POST">
										<div class="input-group ml-auto mb-2 w-50 d-flex align-items-center">
											<input type="text" name='nm_dpt' class="form-control" id="inlineFormInputGroup" placeholder="Cari Siswa">
											<div class="input-group-prepend">
											<button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
										</div>
									</form>
								</th>
							</tr> -->
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
											echo "<td class='bg-danger text-center font-weight-bold border'>".$status_pilih."</td>";;
										}elseif($data['status'] == 1){
											echo "<td class='bg-success text-center font-weight-bold'>".$status_pilih."</td>";
										}else{
											echo "<td class='bg-primary text-center font-weight-bold'>".$status_pilih."</td>";
										}
									?>
									<?php
										if($data['status'] == 0){
											echo "<td class='text-center'><a class='btn btn-primary' href='masuk_antrian.php?id_dpt=".$data['id_dpt']."'>Masuk Antrian <i class='fas fa-chevron-circle-right'></i></a></td>";
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


<!-- nm BIlik -->
	<?php 
                                    while($data2 = mysqli_fetch_array($eksekusi2)){?>
                                        <th scope="col" class="text-center"><?php echo $data2['nm_bilik']?></th>
                                <?php }?>