<html lang="en" class="h-100">
	<head>
	    <title>Kaset</title>

	    <!-- Bootstrap core CSS -->
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
			<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

	    <style>
	      .bd-placeholder-img {
	        font-size: 1.125rem;
	        text-anchor: middle;
	        -webkit-user-select: none;
	        -moz-user-select: none;
	        -ms-user-select: none;
	        user-select: none;
	      }

	      @media (min-width: 768px) {
	        .bd-placeholder-img-lg {
	          font-size: 3.5rem;
	        }
	      }
	    </style>
	    <link href="sticky-footer.css" rel="stylesheet">
  	</head>
	<body class="d-flex flex-column h-100">
		<br>

		<?php $this->load->view('include/navbar'); ?>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4">
					<?php $this->load->view('include/notification'); ?>
					<div class="card">
						<div class="card-body">
							<div class="container-fluid">
								<h2>Tambah Kaset</h2>
								<form method="post" action="<?php echo base_url(); ?>admin/tambah_kaset">
								  <div class="form-group col-md-12">
								    <label for="inputKodeKaset">Kode Kaset :</label>
								    <input type="text" class="form-control" name="inputKodeKaset" id="inputKodeKaset" placeholder="Kode Kaset" required>
								  </div>
								  <div class="form-group col-md-12">
								    <label for="inputJudulKaset">Judul :</label>
								    <input type="text" class="form-control" name="inputJudulKaset" id="inputJudulKaset" placeholder="Judul Kaset" required>
								  </div>
								  <div class="form-group col-md-12">
								    <label for="inputJenisKaset">Genre :</label>
								    <input type="text" class="form-control" name="inputJenisKaset" id="inputJenisKaset" placeholder="Genre Kaset" required>
								  </div>
								  <div class="form-group col-md-12">
								    <label for="inputStok">Stock :</label>
								    <input type="number" class="form-control" name="inputStok" id="inputStok" placeholder="Stock Kaset" required>
								  </div>
								  <div class="form-group col-md-12">
								    <label for="inputharga">Harga Satuan :</label>
								    <input type="number" class="form-control" name="inputharga" id="inputharga" placeholder="Harga Kaset" required>
								  </div>
								  <div class="form-group col-md-12">
								    <input name="submit" type="submit" class="btn btn-success" value="Tambah">
								  </div>

								</form>

							</div>

						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="card">
						<div class="card-body">
							<h1>Tabel Kaset</h1>
							<table class="table table-bordered table-striped" id="tabelKaset">
							  <thead>
							    <tr>
							      <th scope="col">No.</th>
							      <th scope="col">Kode Kaset</th>
							      <th scope="col">Judul</th>
							      <th scope="col">Jenis</th>
							      <th scope="col">Stok</th>
							      <th scope="col">Harga Satuan</th>
							      <th scope="col">Aksi</th>
							    </tr>
							  </thead>
							  <tbody>
							  	<?php $i = 1; foreach($kaset as $row){?>

							    <tr>
							      <th><?php echo $i++; ?></th>
							      <td><?php echo $row['kode']; ?></td>
							      <td><?php echo $row['judul']; ?></td>
							      <td><?php echo $row['jenis']; ?></td>
							      <td><?php echo $row['stok']; ?></td>
							      <td>Rp <?php echo number_format($row['harga'], 2, ',', '.'); ?></td>
							      <td>
							      	<a href="javascript:void(0)" onclick="edit_kaset(<?php echo $row['id_kaset']; ?>)" class="btn btn-primary">Edit</a>
							      	<a href="javascript:void(0)" onclick="hapus_kaset(<?php echo $row['id_kaset']; ?>)" class="btn btn-danger">Hapus</a>
							      </td>
							    </tr>

							    <?php } ?>

							  </tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

		</div>

		<?php $this->load->view('include/footer'); ?>

		<div class="modal fade" id="editKasetModal" tabindex="-1" role="dialog" aria-labelledby="editKasetModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="editKasetModalLabel">Edit Kaset <b id="editJudulKaset"></b></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
					<form method="post" id="formEditKaset">
			      <div class="modal-body">
			        <div class="container-fluid">
									<div class="form-group col-md-12">
										<label for="inputKodeKasetEdit">Kode Kaset :</label>
										<input type="text" class="form-control" name="inputKodeKasetEdit" id="inputKodeKasetEdit" placeholder="Kode Kaset" required>
									</div>
									<div class="form-group col-md-12">
										<label for="inputJudulKasetEdit">Judul :</label>
										<input type="text" class="form-control" name="inputJudulKasetEdit" id="inputJudulKasetEdit" placeholder="Judul Kaset" required>
									</div>
									<div class="form-group col-md-12">
										<label for="inputJenisKasetEdit">Genre :</label>
										<input type="text" class="form-control" name="inputJenisKasetEdit" id="inputJenisKasetEdit" placeholder="Genre Kaset" required>
									</div>
									<div class="form-group col-md-12">
										<label for="inputStokEdit">Stock :</label>
										<input type="number" class="form-control" name="inputStokEdit" id="inputStokEdit" placeholder="Stock Kaset" required>
									</div>
									<div class="form-group col-md-12">
										<label for="inputhargaEdit">Harga Satuan :</label>
										<input type="number" class="form-control" name="inputhargaEdit" id="inputhargaEdit" placeholder="Harga Kaset" required>
									</div>
			        </div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
			        <button type="submit" class="btn btn-success">Simpan</button>
			      </div>
					</form>
		    </div>
		  </div>
		</div>

		<div class="modal fade" id="hapusKasetModal" tabindex="-1" role="dialog" aria-labelledby="hapusKasetModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="hapusKasetModalLabel">Konfirmasi Hapus Kaset</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <div class="container-fluid">
							Ingin menghapus kaset <b id="hapusJudulKaset"></b>?
		        </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
		        <a id="btnHapusKaset" class="btn btn-danger">Hapus</a>
		      </div>
		    </div>
		  </div>
		</div>

		<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript">
			$('#tabelKaset').DataTable();

			function edit_kaset(id)
			{
				$.ajax({
					method : 'GET',
					url : '<?php echo base_url(); ?>admin/get_kaset_by_id/' + id,
					success : function (respond) {
						data = JSON.parse(respond);
						console.log(data);
						$('#formEditKaset').trigger("reset");
						$("#editJudulKaset").val(data.judul);
						$("#inputKodeKasetEdit").val(data.kode);
						$("#inputJudulKasetEdit").val(data.judul);
						$("#inputJenisKasetEdit").val(data.jenis);
						$("#inputStokEdit").val(data.stok);
						$("#inputhargaEdit").val(data.harga);
						$('#formEditKaset').attr("action", '<?php echo base_url(); ?>admin/edit_kaset/'+id);
					}
				});
				$("#editKasetModal").modal('show');
			}
			function hapus_kaset(id)
			{
				$.ajax({
					method : 'GET',
					url : '<?php echo base_url(); ?>admin/get_kaset_by_id/' + id,
					success : function (respond) {
						data = JSON.parse(respond);
						console.log(data);
						$("#hapusJudulKaset").html(data.judul);
						$('#btnHapusKaset').attr("href", '<?php echo base_url(); ?>admin/hapus_kaset/'+id);
					}
				});
				$("#hapusKasetModal").modal('show');
				console.log(id);
			}
		</script>

	</body>
</html>
