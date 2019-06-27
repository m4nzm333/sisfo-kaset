<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php base_url(); ?>asset/costum/css/login.css">
</head>
<body style="background: url('<?php base_url();?>asset/img/cover_login.jpg')">
	<div class="wrapper fadeInDown">
		<?php $this->load->view('include/notification') ?>
	  <div id="formContent">
	    <div class="fadeIn first">
	      <h1>Sistem Informasi Penjualan Kaset</h1>
	    </div>
	    <form  action="<?php echo base_url(); ?>login/masuk" method="post">
	      <input type="text" id="username" class="fadeIn second" name="username" placeholder="Username">
	      <input type="password" id="password" class="fadeIn second" name="password" placeholder="Password">
	      <input type="submit" class="fadeIn fourth" value="Log In">
	    </form>
	  </div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
