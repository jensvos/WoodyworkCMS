<?php

session_start();
include_once('../includes/connection.php');

if (isset($_SESSION['logged_in'])) {
 if(isset($_POST['title'], $_POST['content'])) {
   $title = $_POST['title'];
   $content = nl2br($_POST['content']);

   if (empty($title) or empty ($content)) {
      $error = "Alle velden zijn verplicht!";
   } else {
     $query = $pdo->prepare("INSERT INTO article (article_title, article_content, article_timestamp) VALUES (?, ?, ?)");

     $query ->bindValue(1, $title);
     $query ->bindValue(2, $content);
     $query ->bindValue(3, time());

     $query->execute();

     header('Location: index.php');

   }
 }
  // laat 'toevoegpagina' zien //
  ?>

  <html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <meta name="HandheldFriendly" content="true">      <title>WoodyworkCMS</title>
      <link rel="icon" href="../img/favicon.png" type="image/x-icon">
      <link rel="stylesheet" href="../includes/style.css">
    </head>
    <body>
      <div class="container">
        <div class="logo">
        <a href="index.php" id="logo">CMS</a>
        </div>
        <h4>Artikel toevoegen</h4>
        <?php if (isset($error)) {?>
          <small style="color:#aa0000;"><?php echo $error; ?></small>
          <br></br>
        <?php } ?>
        <form action="add.php" method="post" autocomplete="off">
          <div class="textarea">
          <input type="text" name="title" placeholder="Titel"><br></br>
          <textarea rows="15" cols="40" placeholder="Inhoud" name="content"></textarea><br></br>
          </div>
          <input type="submit" value="Artikel toevoegen">
        </form>
        <a href="index.php">&larr; Terug</a>
      </div>
    </body>
  </html>

  <?php

} else {
  header('Location: index.php');

}

?>
