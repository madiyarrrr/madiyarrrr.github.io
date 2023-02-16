<header id="header">
<div class="header__top">
<div class="container">
    <div class="header__top__logo">
    <h2><?php echo $config['title']; ?></h2>
    </div>
    <nav class="header__top__menu">
    <ul>
        <li><a href="/">Главная</a></li>
        <li><a href="/pages/about_me.php">Обо мне</a></li>
        <li><a href="<?php echo $config['vk_url']; ?>" target="_blank">Я Вконтакте</a></li>
        <li><a href="/exit.php">Log out</a></li>
    </ul>
    </nav>
</div>
</div>

<?php
    $categories = mysqli_query($connection, "SELECT * FROM `categories_of_articles`");
?>
<div class="header__bottom">
<div class="container">
    <nav>
    <ul>
        <?php
            while($cat = mysqli_fetch_assoc($categories)) 
            { 
                ?>
                <li><a href="/category.php?id=<?php echo $cat['id']; ?>"><?php echo $cat['title']; ?></a></li>
            <?php
            }
            ?>
    </ul>
    </nav>
</div>
</div>
</header>