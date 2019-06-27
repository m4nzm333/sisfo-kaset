
<nav class="navbar navbar-light bg-light justify-content-between">


</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" style="font-size:25px !important;">
		Sistem Informasi
		<br>Penjualan Kaset
	</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">

      <a class="btn btn-primary nav-item nav-link text-light" href="<?php echo base_url(); ?>admin/transaksi">
				<img src="<?php echo base_url(); ?>asset/img/transaction.png" height="50px" width="50px"  alt="">
					Transaksi
			</a>
			&nbsp
			<a class="btn btn-primary nav-item nav-link text-light" href="<?php echo base_url(); ?>admin/kaset">
				<img src="<?php echo base_url(); ?>asset/img/cd.png" height="50px" width="50px" alt="">
					Kaset
			</a>
    </div>
  </div>
	<div class="my-2 my-sm-0">
		<img src="<?php echo base_url(); ?>asset/img/account.png" alt="" height="75px" width="75px" class="rounded-circle">
		<a class="navbar-brand"><?php echo $this->session->userdata('nama'); ?></a>
		<a class="btn btn-outline-danger" href="<?php echo base_url(); ?>login/keluar">Keluar</a>
	</div>
</nav>
<br>
