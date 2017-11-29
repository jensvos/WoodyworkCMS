<?php

session_start();
include_once('../includes/connection.php');
include_once('../includes/article.php');

$article = new Article;

if (isset($_SESSION['logged_in'])) {
  if (isset($_GET['id'])) {
      $id = $_GET['article_id'];

      $query = $pdo->prepare("DELETE FROM article WHERE article_id = ?");
      $query ->bindValue(1, $id);
      $query ->execute();

      header('Location: delete.php');
  }
    $articles = $article->fetch_all();

    ?>
    <html>
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="HandheldFriendly" content="true">
        <title>WoodyworkCMS</title>
        <link rel="icon" href="../img/favicon.png" type="image/x-icon">
        <link rel="stylesheet" href="../includes/style.css">
      </head>
      <body>
        <div class="container">
        <div class="logo">
          <a href="index.php" id="logo">CMS</a>
        </div>
          <h4>Selecteer een artikel om te verwijderen:</h4>
          <div class="delete">
          <form action="delete.php" method="get">
            <select onchange="this.form.submit();">
              <?php foreach ($articles as $article) { ?>
                <option value="<?php echo $article['article_id']; ?>"><?php echo $article['article_title']; ?></option>
              <?php } ?>
            </select>
          </form>
          </div>
          <a href="index.php">&larr; Terug</a>
        </div>
      </body>
    </html>
    <?php

} else {
  header('Location: index.php');
}

?>
