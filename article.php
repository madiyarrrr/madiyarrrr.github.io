<?php
    require "includes/config.php";
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
    <?php include "includes/header.php"; ?>
    <div id="content">
      <div class="container">
        <div class="row">
          <section class="content__left col-md-8">
            <div class="block">
              <a href="/allarticles.php">Все записи</a>
              <h3>Новейшее_в_блоге</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">

                  <?php
                    $articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `id` DESC LIMIT 10");
                    while($art = mysqli_fetch_assoc($articles)) 
                    { 
                  ?>
                  <article class="article">
                    <div class="article__image" style="background-image: url(/static/images/<?php echo $art['image']; ?>);"></div>
                    <div class="article__info">
                      <a href="/articles.php?id=<?php echo $art['id']; ?>"><?php echo $art['title']; ?></a>
                      <div class="article__info__meta">
                        <?php
                        $art_cat = false;
                        foreach($categories as $cat) {
                            if($cat['id'] == $art['category_id']) {
                                $art_cat = $cat;
                                break;
                            }
                        }
                        ?>
                        <small>Категория: <a href="/category.php?id=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title']; ?></a></small>
                      </div>
                      <div class="article__info__preview"><?php echo mb_substr($art['text'], 0, 55, 'utf-8') . ' ...'; ?></div>
                    </div>
                  </article>
                  <?php
                    }
                  ?>

                </div>
              </div>
            </div>

            <div class="block">
              <a href="/articles.php?category=4">Все записи</a>
              <h3>Games [Новейшее]</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">

                  <?php
                    $articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `category_id` = 4 ORDER BY `id` DESC LIMIT 10");
                    while($art = mysqli_fetch_assoc($articles)) 
                    { 
                  ?>
                  <article class="article">
                    <div class="article__image" style="background-image: url(/static/images/<?php echo $art['image']; ?>);"></div>
                    <div class="article__info">
                      <a href="/articles.php?id=<?php echo $art['id']; ?>"><?php echo $art['title']; ?></a>
                      <div class="article__info__meta">
                        <?php
                        $art_cat = false;
                        foreach($categories as $cat) {
                            if($cat['id'] == $art['category_id']) {
                                $art_cat = $cat;
                                break;
                            }
                        }
                        ?>
                        <small>Категория: <a href="/category.php?id=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title']; ?></a></small>
                      </div>
                      <div class="article__info__preview"><?php echo mb_substr($art['text'], 0, 55, 'utf-8') . ' ...'; ?></div>
                    </div>
                  </article>
                  <?php
                    }
                  ?>

                </div>
              </div>
            </div>

            <div class="block">
              <a href="/articles.php?category=5">Все записи</a>
              <h3>Programming [Новейшее]</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">

                  <?php
                    $articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `category_id` = 5 ORDER BY `id` DESC LIMIT 10");
                    while($art = mysqli_fetch_assoc($articles)) 
                    { 
                  ?>
                  <article class="article">
                    <div class="article__image" style="background-image: url(/static/images/<?php echo $art['image']; ?>);"></div>
                    <div class="article__info">
                      <a href="/articles.php?id=<?php echo $art['id']; ?>"><?php echo $art['title']; ?></a>
                      <div class="article__info__meta">
                        <?php
                        $art_cat = false;
                        foreach($categories as $cat) {
                            if($cat['id'] == $art['category_id']) {
                                $art_cat = $cat;
                                break;
                            }
                        }
                        ?>
                        <small>Категория: <a href="/category.php?id=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title']; ?></a></small>
                      </div>
                      <div class="article__info__preview"><?php echo mb_substr($art['text'], 0, 55, 'utf-8') . ' ...'; ?></div>
                    </div>
                  </article>
                  <?php
                    }
                  ?>

                </div>
              </div>
            </div>
          </section>
          <section class="content__right col-md-4">
            <?php include "includes/sidebar.php"; ?>
          </section>
        </div>
      </div>
    </div>

    <?php include "includes/footer.php"; ?>

  </div>
  </body>

</html>