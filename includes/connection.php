<?php

// verbinden met database //
try {
$pdo = new PDO('mysql:host=localhost;dbname=woodywork', 'root');
} catch (PDOException $e) {
  exit ("Database error: er kan geen verbinding worden gemaakt met de database!");
}

?>
