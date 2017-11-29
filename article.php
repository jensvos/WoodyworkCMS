<?php

include_once("includes/connection.php");
include_once("includes/article.php");

$article = new Article;

if(isset($_GET['id'])) {
   $id = $_GET['id'];
   $data = $article->fetch_data($id);

?>

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
      <a href="index.php" id="logo">CMS</a>
      <h4>
        <?php echo $data['article_title']; ?> -
        <small>gepost op <?php echo date('l jS', $data['article_timestamp']); ?></small>
      </h4>
      <p><?php echo $data['article_content']; ?></p>
      <a href="index.php">&larr; Back</a>
    </div>
  </body>
</html>

<?php

} else {
  header ('Location: index.php');
  exit();
}

?>
