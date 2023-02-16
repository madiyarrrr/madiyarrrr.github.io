<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Login Page</title>
		<link rel="stylesheet" href="/css/style.css">
	</head>

	<body>
      <div class="madwrapper">
		<div class="madcontainer">
			<div class="madlogin-left">
				<div class="madlogin-header">
					<h1>Welcome to Our Application</h1>
					<p>Please login to use the platform</p>
				</div>
				<form class="madlogin-form">
					<div class="madlogin-form-content">
						<div class="madform-item">
							<label for="email">Enter Email</label>
							<input class="madinput" type="text" id="email">
						</div>
						<div class="madform-item">
							<label for="password">Enter Password</label>
							<input class="madinput" type="password" id="password">
						</div>
						<div class="madform-item">
							<div class="checkbox">
								<input class="madcheckboxinput" type="checkbox" id="rememberMeCheckbox" checked>
								<label for="rememberMeCheckbox" class="madcheckboxLabel">Remember me</label>
							</div>
						</div>
						<button class="madbutton" type="submit" name="signin">Sign In</button>
                        <button class="madbutton" type="submit" name="signup">Sign Up</button>
					</div>
					<div class="madlogin-form-footer">
						<a href="#">
							<img width="30" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/2021_Facebook_icon.svg/2048px-2021_Facebook_icon.svg.png" alt="">
							Facebook Login
						</a>
						<a href="#">
							<img width="30" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/2048px-Google_%22G%22_Logo.svg.png" alt="">
							Google Login
						</a>
					</div>
				</form>
			</div>
			<div class="madlogin-right">
				<img width="80%" src="./image.svg">
		 </div>
		</div>
      </div>
	</body>
</html>