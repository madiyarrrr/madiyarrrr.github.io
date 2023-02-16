<?php
    require "includes/config.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="madiyar, Madiyar, useful content, useful articles, articles, articles about nature, buses, nature, interesting articles">
    <meta name="robots" content="index, follow">
    <meta name="author" content="Maselbek Madiyar">
    <meta name="description" lang="en" content="We have useful content in our site">
    <meta name="description" lang="ru" content="У нас имеется полезный контент">
    <meta name="google-site-verification" content="xOK6hNqo8657QErzavPyBKy5fruu1Y1CY_GCbupDm9o" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="http://madiyar.gq/">
    <title>Interesting global news</title>

    <!-- Bootstrap Grid -->
    <link rel="stylesheet" type="text/css" href="/media/assets/bootstrap-grid-only/css/grid12.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="/media/css/style.css">

    <link rel="stylesheet" href="/css/style.css">

    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/5813/5813974.png" type="image/png">

    <style>
        .madform-item {
            position: relative;
        }

        .password-control {
            position: absolute;
            top: 14px;
            right: 20px;
            display: inline-block;
            width: 27px;
            height: 27px;
            background: url(https://snipp.ru/demo/495/view.svg) 0 0 no-repeat;
        }
        .password-control.view {
            background: url(https://snipp.ru/demo/495/no-view.svg) 0 0 no-repeat;
        }
    </style>
  </head>
  <body>
    <?php
        if($_COOKIE['user'] == ''):
    ?>
    <div class="madwrapper">
		<div class="madcontainer">
			<div class="madlogin-left">
				<div class="madlogin-header">
					<h1>Welcome to Our Application</h1>
					<p>Please login to use the platform</p>
				</div>
				<form class="madlogin-form" method="POST" action="/">
                  <?php
                      if(isset($_POST['signup'])) {
                          $errors = array();
                          $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
                          $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
                          $result = mysqli_query($connection, "SELECT * FROM `users` WHERE `login` = '$login'");
                          $user = $result->fetch_assoc();
                          if($login == '') {
                              $errors[] = 'Enter login!';
                              $empty_login = "Enter login!";
                          }
                          if($pass == '') {
                              $errors[] = 'Type password!';
                              $empty_password = "Type password!";
                          }

                          if(mb_strlen($login) < 3 || mb_strlen($login) > 30) {
                            $errors[] = 'Login must be at least 3 characters and not more than 30!';
                            $wrong_number_of_logincharacters = 'Login must be at least 3 characters and not more than 30!';
                          }

                          if(mb_strlen($pass) < 3 || mb_strlen($pass) > 20) {
                            $errors[] = 'Invalid password length (3 to 20 characters)!';
                            $wrong_number_of_passcharacters = 'Invalid password length (3 to 20 characters)!';
                          }

                          if(!preg_match("/^[a-zA-Z0-9]+$/",$login)) {
                            $errors[] = 'Login can only contain letters of the English alphabet and numbers!';
                            $patternerror = 'Login can only contain letters of the English alphabet and numbers!';
                          }

                          if(count((array)$user) >= 1) {
                            $errors[] = 'This user already exists!';
                            $existerror = 'This user already exists!';
                          }

                          $pass = md5($pass."f2jakfir93");
                          if(empty($errors)) {
                              mysqli_query($connection, "INSERT INTO `users` (`login`,`pass`) VALUES('$login', '$pass')");
                              echo '<p style="color:green;font-weight:bold;margin-bottom:15px">Sucsessfully signed up!</p>';
                          } 
                      }

                      if(isset($_POST['signin'])) {
                        $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
                        $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

                        $pass = md5($pass."f2jakfir93");

                        $result = mysqli_query($connection, "SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");
                        $user = $result->fetch_assoc();

                        if(count((array)$user) == 0) {
                            echo '<p style="color:red;font-weight:bold;margin-bottom:15px">No such user found!</p>';
                        }
                        else {
                        setcookie('user', $user['login'], time() + 3600, "/"); 
                        header('Location: /');
                        }
                      }
                    ?>
					<div class="madlogin-form-content">
						<div class="madform-item">
							<label for="name">Enter Login</label>
							<input class="madinput" type="text" id="name" name="login" value="<?php echo $_POST['login']; ?>">
                            <?php 
                                if(!empty($empty_login)) {
                                    echo '<br><p style="color:red;font-weight:bold;margin-bottom:15px">' . $empty_login . '</p>';
                                }
                                else if(!empty($wrong_number_of_logincharacters)) {
                                    echo '<br><p style="color:red;font-weight:bold;margin-bottom:15px">' . $wrong_number_of_logincharacters . '</p>';
                                }
                                else if(!empty($patternerror)) {
                                    echo '<br><p style="color:red;font-weight:bold;margin-bottom:15px">' . $patternerror . '</p>';
                                }
                                else if(!empty($existerror)) {
                                    echo '<br><p style="color:red;font-weight:bold;margin-bottom:15px">' . $existerror . '</p>';
                                }
                            ?>
						</div>
						<div class="madform-item">
							<label for="password">Enter Password</label>
							<input class="madinput" type="password" id="password" name="pass" value="<?php echo $_POST['pass']; ?>">
                            <a href="" class="password-control" onclick="return show_hidden_password(this)"></a>
                            <?php 
                                if(!empty($empty_password)) {
                                    echo '<br><p style="color:red;font-weight:bold;margin-bottom:15px">' . $empty_password . '</p>';
                                }
                                else if(!empty($wrong_number_of_passcharacters)) {
                                    echo '<br><p style="color:red;font-weight:bold;margin-bottom:15px">' . $wrong_number_of_passcharacters . '</p>';
                                }
                            ?>
                            <?php 

                            ?>
						</div>
						<div class="madform-item">
							<div class="checkbox">
								<input class="madcheckboxinput" type="checkbox" id="rememberMeCheckbox" checked>
								<label for="rememberMeCheckbox" class="madcheckboxLabel">Remember me</label>
                                <a class="linkguest" href="/article.php">Log in as Guest</a>
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
            <script>
                function show_hidden_password(target) {
                    var input = document.getElementById('password');
                    if (input.getAttribute('type') == 'password') {
                        target.classList.add('view');
                        input.setAttribute('type', 'text');
                    } else {
                        target.classList.remove('view');
                        input.setAttribute('type', 'password');
                    }
                    return false;
                }
            </script>
		</div>
    </div>
    <?php else: ?>
      <div id="back" style="background:linear-gradient(45deg,#2bb358,#d1ff00)">
        <span class="madspan" style="color:white;font-size:30px;width:auto">Welcome <b><?=$_COOKIE['user']?></b>.</span>
        <span class="madspann">
            <a style="text-decoration:underline;cursor:pointer;" onclick="bluetheme()">Change Theme</a>
            <img alt="Change background theme" usemap="#changemap" height='50px' src="static/images/changetheme.png">
        </span>
        <map name="changemap">
            <area shape="rect" coords="0,0,25,25" onclick="bluetheme()">
            <area shape="rect" coords="25,0,50,25" onclick="yellowtheme()">
            <area shape="rect" coords="0,25,25,50" onclick="redtheme()">
            <area shape="rect" coords="25,25,50,50" onclick="greentheme()">
        </map>
        <script>
            var theme = document.getElementById('back');
            function bluetheme() {
                theme.style.background = 'linear-gradient(45deg,#0034d4,#00ffd5)';
            }
            function yellowtheme() {
                theme.style.background = 'linear-gradient(45deg,orange,rgb(237 255 0))';
            }
            function redtheme() {
                theme.style.background = 'linear-gradient(45deg,#550b0b,red)';
            }
            function greentheme() {
                theme.style.background = 'linear-gradient(45deg,#2bb358,#d1ff00)';
            }
        </script>
        <?php require "article_test.php"; ?>
      </div>
    <?php endif;?>
  </body>
</html>
