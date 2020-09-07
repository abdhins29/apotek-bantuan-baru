<?php include'header.php'; ?>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-title p-b-49">
						Silahkan Login
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Type your username">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div><br>

					<div class="wrap-input100 validate-input" data-validate="Level is required">
						<span class="label-input100">Level</span>
						<select name="level" class="form-control">
							<option value="admin">Admin</option>
							<option value="kasir">Kasir</option>
						</select>
					</div><br>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" name="submit">
								Login
							</button>
						</div>
					</div>
<?php
	session_start();
	include ("config/koneksi.php");

	if (isset($_POST['submit'])) {
		$query = mysqli_query($konek,"SELECT * FROM login WHERE username = '$_POST[username]' AND password = '$_POST[password]' AND level = '$_POST[level]'");
		$row = mysqli_num_rows($query);
			if($row > 0){
		  		$data = mysqli_fetch_assoc($query);
			    if ($data['level'] == "admin") {
				    $_SESSION['username']=$data["username"];
				    $_SESSION['level']="admin";
					echo '<script>alert("Welcome Admin!");</script>';
					echo '<script>window.location.href="admin/index.php";</script>';
		    	}else if ($data['level'] == "kasir") {
				    $_SESSION['username']=$data["username"];
				    $_SESSION['level']="kasir";
					echo '<script>alert("Welcome Kasir!");</script>';
					echo '<script>window.location.href="kasir/index.php";</script>';
		  		}
		}else{
			header("location:index.php");
		}
	}
?>
				</form>
			</div>
		</div>
	</div>
	
	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>