<?php
    require "../includes/config.php";
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $config['title']; ?></title>

    <!-- Bootstrap Grid -->
    <link rel="stylesheet" type="text/css" href="/media/assets/bootstrap-grid-only/css/grid12.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/media/css/style.css">

  </head>

  <body>
    <div id="wrapper">
    <div class="block">
              <a href="/">Главная страница</a>
              <h3>Правообладателям</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">
    <article class="article">
                    <div class="article__image" style="background-image: url(https://sun9-34.userapi.com/impg/2iJqRiANaKKYNu_xxS7QwR7yDE5DBKuxym7Esg/yXNB4gAKirI.jpg?size=816x1088&quality=96&sign=9591a09aa35a5e244079dbc8ac8dd48b&type=album);"></div>
                    <div class="article__info">
                      <a href="#">Меня зовут Маселбек Мадияр</a>
                      <div class="article__info__meta">
                        <small>Специалист: <a href="#">Программист</a></small>
                      </div>
                      <div class="article__info__preview">Текст для копирайта.</div>
                    </div>
                  </article>
                  </div>
              </div>
            </div>
    <?php include "../includes/footer.php"; ?>
  </body>

</html>