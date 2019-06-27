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

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-1">
				</div>
				<div class="col-md-10">
					<div class="card">
						<div class="card-body">
							<div class="container-fluid">
								<div class="row">
									<div class="col-xs-12 col-sm-4 col-md-2">ID Transaksi</div>
									<div class="col-xs-12 col-sm-8 col-md-8">: <strong>1</strong></div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-4 col-md-2">Pembeli</div>
									<div class="col-xs-12 col-sm-8 col-md-8">: <strong>Pembeli1</strong></div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-4 col-md-2">Penjual</div>
									<div class="col-xs-12 col-sm-8 col-md-8">: <strong>Asfian</strong></div>
								</div>
							</div>
							  
						</div>
					</div>
				</div>
				<div class="col-md-1">
				</div>
			</div>

		</div>

		<hr>

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
							      <th scope="col">Genre</th>
							      <th scope="col">Jumlah</th>
							      <th scope="col">Harga Satuan</th>
							      <th scope="col">Harga Total</th>
							    </tr>
							  </thead>
							  <tbody>

							    <tr>
							      <th>1</th>
							      <td>KASET001</td>
							      <td>Avenger</td>
							      <td>Action</td>
							      <td>5</td>
							      <td>Rp 20.000</td>
							      <td><strong>Rp 40.000</strong></td>
							    </tr>

							  </tbody>
							</table>
							<div class="row">
								<div class="col-xs-12 col-sm-8 col-md-10">
									<div class="float-right"><strong>Total :</strong></div>
								</div>
								<div class="col-xs-12 col-sm-4 col-md-2">
									<div class="float-right"><strong>Rp. 40.000</strong></div>							

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