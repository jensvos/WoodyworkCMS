<?php

// artikelen ophalen d.m.v. SQL query //
class Article {
  public function fetch_all() {
    global $pdo;

    $query = $pdo->prepare("SELECT * FROM article");
    $query->execute();

    return $query->fetchAll();
  }
  public function fetch_data($article_id){
    global $pdo;

    $query = $pdo->prepare("SELECT * FROM article WHERE article_id = ?");
    $query->bindValue(1, $article_id);
    $query->execute();

    return $query->fetch();
  }
}

?>
