<?php 

session_start();

require_once "connection.php";

if (isset($_POST['submit'])) {

	$username = $_POST['username'];
	$password = $_POST['password'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$jobposition = $_POST['jobposition'];
	$employeecode = $_POST['employeecode'];
	$phone = $_POST['phone'];
	$user_check = "SELECT * FROM user WHERE username = '$username' LIMIT 1";
	$result = mysqli_query($conn, $user_check);
	$user = mysqli_fetch_assoc($result);

	if ($user['username'] === $username) {
		echo "<script>alert('Username already exists');</script>";
	} else {
		$passwordenc = md5($password);

		$query = "INSERT INTO user (username, password, firstname, lastname, jobposition, employeecode, phone, userlevel)
					VALUE ('$username', '$passwordenc', '$firstname', '$lastname', '$jobposition', '$employeecode', '$phone', 'm')";
		$result = mysqli_query($conn, $query);

		if ($result) {
			$_SESSION['success'] = "Insert user successfully";
			header("Location: index.php");
		} else {
			$_SESSION['error'] = "Something went wrong";
			header("Location: index.php");
		}
	}

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>ระบบสมาชิกพนักงาน</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			
			

				<form class="login100-form validate-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					<span class="login100-form-title">
						<br>Registration
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span> </span>
						<span class="symbol-input100">
							<i class="fa fa-male" aria-hidden="true"></i>
							
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="firstname" placeholder="Firstname">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-vcard" aria-hidden="true"></i>
						</span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="lastname" placeholder="Lastname">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-vcard-o" aria-hidden="true"></i>
						</span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="jobposition" placeholder="job position">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-gears" aria-hidden="true"></i>
						</span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="employeecode" placeholder="employee code">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-credit-card" aria-hidden="true"></i>
						</span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="phone" placeholder="Phone">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-mobile-phone" aria-hidden="true"></i>
						</span>
                    </div>
                    
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="submit">
							Register
						</button>
					</div>

					

					<div class="text-center p-t-136">
						<a class="txt2" href="index.php">
							Come back to login
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			
		</div>
	</div>
    
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>

	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>