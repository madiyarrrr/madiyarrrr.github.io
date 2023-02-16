<?php
  $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
  $nickname = filter_var(trim($_POST['nickname']), FILTER_SANITIZE_STRING);
  $text = filter_var(trim($_POST['text']), FILTER_SANITIZE_STRING);
  
  require("../blocks/connect.php");

  $mysql->query("INSERT INTO `comments` (`author`, `text`, `nickname`) VALUES('$name', '$text', '$nickname')");

  $mysql->close();

  header('Location: /');
?>
