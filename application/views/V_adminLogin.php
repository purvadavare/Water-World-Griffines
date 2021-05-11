<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'bootstrap/css/bootstrap.css'?>">
</head>
<style type="text/css">
	.main_logo_image{
		height: 100%;
		width: 100%;
		background-repeat: no-repeat;
		background-position: fixed;
	}
	.btn{
		margin-top: 30px;
	}
	.card-header{
		text-align: center;
		font-family: "Bookman Old Style", Times, serif;
		font-weight: bold;
		font-size: 35px;
	}
</style>
<body>
	<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">

						<div class="card card-register mx-auto mt-5">
							<div class="card-header">LOGIN</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<img src="main_logo2.jpg" class="main_logo_image">
									</div>
									<div class="col-md-6">
										<form method="post" action="<?php echo site_url('C_login/auth');?>" >
										<div class="form-group">
											<label>UserName : </label>
											<input type="text" name="role_username" id="role_username" class="form-control" placeholder="Username" required>
										</div>
										<div class="form-group">
											<label>Password : </label>
											<input type="password" name="role_password" id="role_password" class="form-control" placeholder="Password" required>
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-primary btn-block">Login</button>
										</div>
										<form>
									</div>
								</div>
							</div>
						</div>
						<!-- <h2 style="text-align: center;">Admin Login</h2><br><br>
						<?php echo isset($error) ? $error : ''; ?>  
    					<form method="post" id="adminLoginForm" action="<?php echo site_url('C_adminHome/process'); ?>">  
							<div class="form-group">
								<input type="text" name="admin_username" id="admin_username" class="form-control" placeholder="Username">
							</div>
							<div class="form-group">
								<input type="password" name="admin_password" id="admin_password" class="form-control" placeholder="Password">
							</div>
							<input type="submit" class="btn btn-primary btn-block" value="Login">
						</form> -->

				</div>
				<div class="col-md-2"></div>
			</div>
	</div>
</body>
<script type="text/javascript">var BASEPATH = "<?php echo base_url(); ?>";</script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/wadiya_park.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'bootstrap/js/jquery-3.4.1.min.js' ?>"></script>
</html>