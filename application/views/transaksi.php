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
	    <!-- Custom styles for this template -->
	    <link href="sticky-footer.css" rel="stylesheet">
  	</head>
	<body class="d-flex flex-column h-100">
		<!-- Begin page content -->
		<br>

		<?php $this->load->view('include/navbar'); ?>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-1">
				</div>
				<div class="col-md-10">
					<?php $this->load->view('include/notification') ?>
					<div class="card">
						<div class="card-body">
							<h1>Tabel Transaksi</h1>
							<div class="float-right"><button onclick="tambah()" class="btn btn-primary">Tambah Transaksi</button></div>
							<br>
							<br>
							<table class="table table-bordered table-striped" id="tabelTransaksi">
							  <thead>
							    <tr>
							      <th scope="col">No.</th>
							      <th scope="col">Nama Pembeli</th>
							      <th scope="col">Kasir</th>
							      <th scope="col">Waktu</th>
										<th scope="col">Total</th>
							      <th scope="col">Aksi</th>
							    </tr>
							  </thead>
							  <tbody>
									<?php $i =1 ; foreach($transaksi as $row){ ?>
										<tr>
								      <th><?php echo $i++; ?></th>
								      <td><?php echo $row['pembeli']; ?></td>
								      <td><?php echo $row['nama']; ?></td>
											<td><?php echo $row['waktu_beli']; ?></td>
								      <td>Rp <?php echo number_format($row['total'], 2, ',', '.'); ?></td>
								      <td>
								      	<a href="javascript:printExternal('<?php echo base_url(); ?>admin/tambah_transaksi/<?php echo $row['id_transaksi']; ?>')" class="btn btn-success">Cetak</a>
								      	<a href="<?php echo base_url(); ?>admin/tambah_transaksi/<?php echo $row['id_transaksi']; ?>" class="btn btn-primary">Detail</a>
												<a href="<?php echo base_url(); ?>admin/hapus_transaksi/<?php echo $row['id_transaksi']; ?>" class="btn btn-danger">Hapus</a>
								      </td>
								    </tr>
									<?php } ?>
							  </tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-1">
				</div>
			</div>

		</div>

		<?php $this->load->view('include/footer'); ?>

		<div class="modal fade" id="formTambahModal" tabindex="-1" role="dialog" aria-labelledby="formTambahModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		    	<form method="post" action="<?php echo base_url(); ?>admin/tambah_transaksi">
			      <div class="modal-header">
			        <h5 class="modal-title" id="formTambahModalLabel">Tambah Transaksi</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	<div>
			      		<div class="form-group col-md-6">
							    <label for="inputKodeKaset">Nama Pembeli</label>
							    <br>
							    <input type="text" name="inputNamaPembeli" class="form-control" placeholder="Nama Pembeli" required>
						 		</div>
			      	</div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <input type="submit" class="btn btn-primary" value="Tambah">
			      </div>
	      	</form>
		    </div>
		  </div>
		</div>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

		<script type="text/javascript">
			function tambah() {
				$("#formTambahModal").modal({
					show : true
				});
			}

			function printExternal(url) {
			    var printWindow = window.open( url, 'Print', 'left=200, top=200, width=950, height=500, toolbar=0, resizable=0');
			    printWindow.addEventListener('load', function(){
			        printWindow.print();
			        printWindow.close();
			    }, true);
			}

			$('#tabelTransaksi').DataTable();
		</script>

	</body>
</html>
