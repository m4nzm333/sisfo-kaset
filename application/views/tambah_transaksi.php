<html lang="en" class="h-100">
	<head>
	    <title>Kaset</title>

	    <!-- Bootstrap core CSS -->
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


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

		<hr>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-1">
				</div>
				<div class="col-md-10">
					<?php $this->load->view('include/notification'); ?>
					<div class="card">
						<div class="card-body">
							<div class="container-fluid">
								<div class="row">
									<div class="col-xs-12 col-sm-4 col-md-2">ID Transaksi</div>
									<div class="col-xs-12 col-sm-8 col-md-8">: <strong><?php echo $transaksi['id_transaksi']; ?></strong></div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-4 col-md-2">Pembeli</div>
									<div class="col-xs-12 col-sm-8 col-md-8">: <strong><?php echo $transaksi['pembeli']; ?></strong></div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-4 col-md-2">Kasir</div>
									<div class="col-xs-12 col-sm-8 col-md-8">: <strong><?php echo $transaksi['kasir']; ?></strong></div>
								</div>
							</div>

							<hr>

							<form method="post" action="<?php echo base_url(); ?>admin/tambah_order/<?php echo $transaksi['id_transaksi']; ?>" >
							  <div class="form-group col-md-6">
							    <label for="inputKodeKaset">Kaset :</label>
							    <select type="text" class="form-control" id="inputKodeKaset" name="inputKodeKaset" required>
							    	<option value="" selected disabled>=== Pilih Kaset ===</option>
							    	<?php foreach($kaset as $row){ ?>
											<option value="<?php echo $row['id_kaset']; ?>"><?php echo $row['kode']; ?> ---- <?php echo $row['judul']; ?> --- Stok <?php echo $row['stok']; ?></option>
										<?php } ?>
							    </select>
							  </div>
							  <div class="form-group col-md-6">
							    <label for="inputjudulKaset">Jumlah :</label>
							    <input type="number" class="form-control" id="inputJumlahKaset" name="inputJumlahKaset" placeholder="Jumlah Kaset" required>
							  </div>
							  <div class="form-group col-md-6">
							    <button type="submit" class="btn btn-primary" >Tambah</button>
							  </div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-1">
				</div>
			</div>

		</div>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-1">
				</div>
				<div class="col-md-10">
					<div class="card">
						<div class="card-body">
							<h2>Produk</h2>
							<table class="table table-bordered table-striped">
							  <thead>
							    <tr>
							      <th scope="col">No.</th>
							      <th scope="col">Kode Kaset</th>
							      <th scope="col">Judul</th>
							      <th scope="col">Jenis</th>
							      <th scope="col">Jumlah</th>
							      <th scope="col">Harga Satuan</th>
							      <th scope="col">Harga Total</th>
							      <th scope="col">Aksi</th>
							    </tr>
							  </thead>
							  <tbody>

									<?php $total = 0; $i = 1; foreach($order as $row){ ?>
							    <tr>
							      <th><?php echo $i++; ?></th>
							      <td><?php echo $row['kode']; ?></td>
							      <td><?php echo $row['judul']; ?></td>
							      <td><?php echo $row['jenis']; ?></td>
							      <td><?php echo $row['jumlah']; ?></td>
							      <td>Rp <?php echo number_format($row['harga'], 2, ',', '.'); ?></td>
										<?php $total = $total +  ($row['harga'] * $row['jumlah']); ?>
							      <td><strong>Rp <?php echo number_format(($row['harga'] * $row['jumlah']), 2, ',', '.'); ?></strong></td>
							      <td>
							      	<a href="<?php echo base_url(); ?>admin/hapus_order/<?php echo $transaksi['id_transaksi']; ?>/<?php echo $row['id_order']; ?>" class="btn btn-danger">Hapus</a>
							      </td>
							    </tr>
									<?php } ?>

							  </tbody>
							</table>
							<div class="row">
								<div class="col-xs-12 col-sm-8 col-md-10">
									<div class="float-right"><strong>Total :</strong></div>
								</div>
								<div class="col-xs-12 col-sm-4 col-md-2">
									<div class="float-right"><strong>Rp. <?php echo number_format($total, 2, ',', '.'); ?></strong></div>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="float-right">
										<a href="javascript:window.print()" class="btn btn-success">Cetak</a>
										<a href="<?php echo base_url(); ?>admin/transaksi" class="btn btn-primary">Lanjutkan</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-1">
				</div>
			</div>


		</div>

		<?php $this->load->view('include/footer'); ?>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	</body>
</html>
