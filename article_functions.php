<?php 
if(isset($_GET['id'])){

  $article_id = mysqli_real_escape_string($conn, $_GET['id']);

  $sql = "SELECT * FROM articles WHERE id = $article_id";
  $result = mysqli_query($conn, $sql);
  $article = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  
  if($article){

    $uuid = mysqli_real_escape_string($conn, $article['uuid']);

    $sql = "SELECT * FROM users WHERE id = $uuid";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    $article_id = mysqli_real_escape_string($conn, $article['id']);

    $sql = "SELECT * FROM likes WHERE article_id = $article_id";
    $results = mysqli_query($conn, $sql);
    // foreach($results as $r){
    //   print_r($r);
    // }
    $likes = mysqli_fetch_assoc($results);
    $like_count = $results->num_rows;

    mysqli_free_result($results);

    
  }
}

if(isset($_POST['like_article'])){
  
  $uuid = 1; // get UUID from SESSION
  $article_id = mysqli_real_escape_string($conn, $_POST['article_id']);

  $sql = "INSERT INTO likes(uuid, article_id) SELECT '$uuid', '$article_id' WHERE NOT EXISTS(SELECT * FROM likes WHERE uuid= '$uuid' AND article_id = '$article_id')";

  if(mysqli_query($conn, $sql)) header('Location:'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']);
  else echo mysqli_error($conn);
}

if(isset($_POST['like_comment'])){
  
  $uuid = 1; // get UUID from SESSION
  $article_id = mysqli_real_escape_string($conn, $_POST['comment_id']);

  $sql = "INSERT INTO likes(uuid, comment_id) SELECT '$uuid', '$comment_id' WHERE NOT EXISTS(SELECT * FROM likes WHERE uuid= '$uuid' AND comment_id = '$comment_id')";
  
  if(mysqli_query($conn, $sql)) header('Location:'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']);
  else echo mysqli_error($conn);
}

if(isset($_POST['delete_article'])){

  $article_id = mysqli_real_escape_string($conn, $_POST['article_id']);

  $sql = "DELETE FROM articles WHERE id = $article_id";

  if(mysqli_query($conn, $sql)) header('Location: index.php');
  else echo mysqli_error($conn);
}

mysqli_close($conn);
?>