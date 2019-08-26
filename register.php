<!DOCTYPE html>
<html>
<head>
	<title>Senpai Kouhai</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="pic/uib-logo/uib-toplogo.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
  	<link href="assets/css/black-dashboard.css" rel="stylesheet" />
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
					<span class="login100-form-title p-b-26">
						Register
					</span>
					<span class="login100-form-title p-b-48">
						<img src="pic/uib-logo/uib-small.png">
					</span>

					<form action="proses-crud.php" method="post">
						<div class="wrap-input100 validate-input" data-validate = "Enter NPM">
							<input class="input100" type="text" name="npm">
							<span class="focus-input100" data-placeholder="NPM"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Enter Name">
							<input class="input100" type="text" name="name">
							<span class="focus-input100" data-placeholder="Name"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "e.g. : alvin@uib.ac.id">
							<input class="input100" type="text" name="email">
							<span class="focus-input100" data-placeholder="Email"></span>
						</div>


						<div class="wrap-input100" >
							<label class="input100" style="color: white;">Study Program</label>
	                        <select class="form-control" id="exampleFormControlSelect1" name="program_studi">
	                          <option class="text-info" value="31">Information System</option>
	                          <option class="text-info" value="41">Accounting</option>
	                          <option class="text-info" value="51">Law Science</option>
	                          <option class="text-info" value="42">Management</option>
	                          <option class="text-info" value="11">Civil Engineer</option>
	                          <option class="text-info" value="21">Electronic Engineer</option>
	                          <option class="text-info" value="61">English Education</option>
	                          <option class="text-info" value="43">Tourism</option>
	                        </select>
						</div>

						<div class="container-login100-form-btn">
							<div class="wrap-login100-form-btn">
								<div class="login100-form-bgbtn"></div>
								<button type="submit" class="login100-form-btn" name="register">
									REGISTER NOW
								</button>
							</div>
						</div>
					</form>

					<div class="text-center p-t-50">
						<a class="txt2" href="">
							By clicking "REGISTER NOW", we will inform your Head of Study Program.<br> As soon as your form is accepted. We will inform via E-Mail you wrote above.
						</a>
					</div>

					<div class="text-center p-t-50">
						<a class="txt2" href="index.php">
							Have a account? Login
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	


<!--===============================================================================================-->
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/daterangepicker/moment.min.js"></script>
	<script src="login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="login/js/main.js"></script>
</body>
</html>