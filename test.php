<?php
 
include('../includes/config.php');

$result = mysqli_query($connection, "SELECT * FROM `categories_of_articles`");
$user = mysqli_query($connection, "SELECT * FROM `users`");

if(mysqli_num_rows($result) == 0) {
    echo 'Категорий не найдено!';
} else {
?>

<ul>
    <?php
        while(($cat = mysqli_fetch_assoc($result))) {
            $articles_count = mysqli_query($connection, "SELECT COUNT(`id`) AS `total_count` FROM `articles` WHERE `category_id` = " . $cat['id']);
            $articles_count_result = mysqli_fetch_assoc($articles_count);
            echo '<li>' . $cat['title'] . ' (' . $articles_count_result['total_count'] . ')</li>';
        }
    ?>
    <?php
        while(($usr = mysqli_fetch_assoc($user))) {
            echo '<li>' . $usr['login'] . '</li>';
        }
    ?>
</ul>

<?php } ?>

<?php
    echo date('d.m.Y H:i:s');
    mysqli_close($connection);
?>