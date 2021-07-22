<?php
  
  include('config/db_connect.php');

  $sql = 'SELECT * FROM articles ORDER BY created_at DESC';

  $result = mysqli_query($conn, $sql);

  $articles = mysqli_fetch_all($result, MYSQLI_ASSOC);

  mysqli_free_result($result);
  mysqli_close($conn);
?>

<?php require('templates/header.php'); ?>
<div class='content'>
  <h3>Forums</h3>
  <div class="mb-20">
    <?php foreach($articles as $article){?>
      <div class="p-5 post">
        <h4><a href="article.php?id=<?php echo $article['id'] ?>">
          <?php echo htmlspecialchars($article['title']); ?>
        </a></h4>
        <p><?php echo htmlspecialchars($article['content']) ?></p>
        <div></div>
      </div>
    <?php } ?>
  </div>
  <a href="new_article.php" class="btn">Write new post</a>
</div>
<?php require('templates/footer.php'); ?>