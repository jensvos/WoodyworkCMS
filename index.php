<?php
// verbinding maken met database voor artikelen //
include_once("includes/connection.php");
include_once("includes/article.php");

$article = new Article;
$articles = $article->fetch_all();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <title>WoodyworkCMS</title>
    <link rel="icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="includes/style.css">
  </head>
  <body>
    <div class="container">
      <div class="logo">
        <a href="index.php" id="logo">CMS</a>
      </div>
      <ol>
        <?php foreach ($articles as $article) { ?>
        <li><a href="article.php?id=<?php echo $article['article_id']; ?>">
          <?php echo $article['article_title']; ?></a>
          - <small> geplaatst op <?php echo date('l jS', $article['article_timestamp']); ?> </small></li>
          <?php } ?>
      </ol>
      <br>
      <div class="admin">
        <small><a href="admin">(Inlog voor beheerder)</a></small>
      </div>
    </div>
  </body>
</html>
