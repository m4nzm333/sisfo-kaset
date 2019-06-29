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
	<body class="d-flex flex-column h-100" style="background: url('<?php base_url();?>asset/img/cover_login.jpg')">
		<br>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2">
					<div class="card">
						<div class="card-body">
							<h3>Kontak</h3>
							<hr>
							<h4>WA</h4>
							<h5>0852-3910-0141</h5>
							<h4>Instagram</h4>
							<h5>@belikasetku</h5>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<p class="text-right">
						<a href="<?php echo base_url(); ?>login" class="btn btn-primary btn-lg">Login</a>
					</p>
				</div>
			</div>
		</div>
		<br>
		<br>
		<br>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3">
				</div>
				<div class="col-md-6">
					<div class="card">
						<div class="card-body">
							<br>
							<h1>Daftar Kaset</h1>
							<table class="table table-bordered table-striped" id="tabelKaset">
							  <thead>
							    <tr>
							      <th scope="col">No.</th>
							      <th scope="col">Kode Kaset</th>
							      <th scope="col">Judul</th>
							      <th scope="col">Jenis</th>
							      <th scope="col">Stok</th>
							      <th scope="col">Harga Satuan</th>
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
							    </tr>

							    <?php } ?>

							  </tbody>
							</table>
							<br>
						</div>
					</div>
				</div>
				<div class="col-md-4">
				</div>
			</div>

		</div>


		<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript">
			$('#tabelKaset').DataTable({
				"paging": false,
				"info": false
			});


		</script>

	</body>
</html>
