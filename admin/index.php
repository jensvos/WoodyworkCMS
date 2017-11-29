<?php

session_start();
include_once('../includes/connection.php');
if(isset($_SESSION['logged_in'])) {
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
      <h4>Welkom!</h4>
      <ol>
        <li><a href="add.php">Een artikel toevoegen</li>
        <li><a href="delete.php">Een artikel verwijderen</li>
        <li><a href="logout.php">Uitloggen</li>
      </ol>
    </div>
  </body>
</html>

<?php
} else {
  if (isset($_POST['username'], $_POST['password'])) {
      $username = $_POST['username'];
      $password = md5($_POST['password']);

      if (empty($username) or empty($password)) {
        $error = 'Alle velden zijn verplicht!';
      } else {
        $query = $pdo->prepare("SELECT * FROM users WHERE user_name = ? AND user_password = ?");

        $query->bindValue(1, $username);
        $query->bindValue(2, $password);

        $query->execute();

        $num = $query->rowCount();

        if ($num == 1) {
          // als gegevens correct zijn ingevoerd //
          $_SESSION['logged_in'] = true;
          header('Location: index.php');
          exit();
        } else {
          // als gegevens incorrect zijn ingevoerd //
          $error = "Incorrecte gegevens ingevoerd!";
        }
      }
    }
?>

<html>
  <head>
    <meta charset="utf-8">
    <title>WoodyworkCMS</title>
    <link rel="icon" href="../img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../includes/style.css">
  </head>
  <body>
    <div class="container">
      <div class="logo">
        <a href="index.php" id="logo">CMS</a>
      </div>
      <h4>Voer je inloggegevens in:</h4>
      <?php if (isset($error)) {?>
        <small style="color:#aa0000;"><?php echo $error; ?></small>
        <br></br>
      <?php } ?>
      <div class="form">
        <form action="index.php" method="post" autocomplete="off">
          <input type="text" name="username" placeholder="Gebruikersnaam">
          <input type="password" name="password" placeholder="Wachtwoord">
          <input type="submit" name="submit" value="Login">
        </form>
      </div>
    </div>
  </body>
</html>

<?php

}

?>
