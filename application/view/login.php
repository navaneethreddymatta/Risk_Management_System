<!DOCTYPE html>
<html class="no-js"> 
	<head>
		<meta charset="utf-8">
		<title>RMS</title>
		<meta name="description" content="RMS">
		<meta name="author" content="RMS">
		<meta name="robots" content="noindex, nofollow">
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
		<link rel="icon" type="image/png" href="assets/img/rms.png">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/main.css">			
	</head>
	<body>
		<img src="assets/img/background1.jpg" alt="Login Full Background" class="full-bg">
		<div id="login-container" class="animation-fadeIn">
			<div class="login-title text-center"  style="border-radius: 10px 10px 0px 0px;">
				<img src="assets/img/logo.png" width="100px" style="padding:20px 0px" alt="Login Full Background" class="">  
			</div>
			<div class="block remove-margin" style="border-radius: 0px 0px 10px 10px;">
				<form action="index.php?op=login" method="post" id="form-login" class="form-horizontal">
					<div class="form-group">
						<div class="col-xs-12 text-danger">
						<?php echo $error; ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><i class="gi gi-envelope"></i></span>
								<input type="text" id="login-email" name="login-email" class="form-control input-lg" placeholder="Username">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
								<input type="password" id="login-password" name="login-password" class="form-control input-lg" placeholder="Password">
							</div>
						</div>
					</div>
					<div class="form-group form-actions">
						<div class="col-xs-4">
							<input type="hidden" name="form-submitted" value="1" />	
						</div>
						<div class="col-xs-8 text-right">
							<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Login</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>