<?php
  $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
  $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
  $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
  
  require("../blocks/connect.php");
  $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login'");
  $user = $result->fetch_assoc();

  if(mb_strlen($login) < 3 || mb_strlen($login) > 30) {
    echo "Логин должен быть не меньше 3-х символов и не больше 30";
    exit();
  } else if(mb_strlen($name) < 3 || mb_strlen($name) > 50) {
    echo "Недопустимая длина имени";
    exit();
  } else if(mb_strlen($pass) < 3 || mb_strlen($pass) > 20) {
    echo "Недопустимая длина пароля (от 3 до 20 символов)";
    exit();
  } else if(!preg_match("/^[a-zA-Z0-9]+$/",$login)) {
    echo "Логин может состоять только из букв английского алфавита и цифр";
    exit();
  } else if(count((array)$user) >= 1) {
    echo "<h3 style='color:red'>Такой пользователь уже существует!</h3>";
    exit();
  }

  $pass = md5($pass."dgoi52ef");

  $mysql->query("INSERT INTO `users` (`login`, `pass`, `name`) VALUES('$login', '$pass', '$name')");

  $mysql->close();

  header('Location: /');
?>
