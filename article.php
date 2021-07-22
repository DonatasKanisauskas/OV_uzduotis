<?php 
  include('config/db_connect.php');

  require('article_functions.php');
  
  include('templates/header.php') 
?>

<div class="content">
  <?php if($article && $user){ ?>
    <h3><?php echo htmlspecialchars($article['title']) ?></h3>
    <p>writen by: <?php echo htmlspecialchars($user['name']) ?> | <?php echo htmlspecialchars($article['created_at']) ?></p>
    <div class="box">
      <p name=""><?php echo htmlspecialchars($article['content']) ?></p>
    </div>
    <p><?php echo htmlspecialchars($like_count) ?> likes</p>
    
    <form action="" method="POST" class="inline-block">
      <input type="hidden" name="article_id" value="<?php echo htmlspecialchars($article['id']) ?>">
      <input type="submit" name="like_article" value="Like" class="btn btn-lime">
    </form>
    <form action="" method="POST" class="inline-block">
      <input type="hidden" name="article_id" value="<?php echo htmlspecialchars($article['id']) ?>">
      <input type="submit" name="comment" value="Comment" class="btn">
    </form>
    <form action="" method="POST" class="inline-block">
      <input type="hidden" name="article_id" value="<?php echo htmlspecialchars($article['id']) ?>">
      <input type="submit" name="delete_article" value="DELETE" class="btn btn-red">
    </form>
  <?php } else { ?>
    <p>Post doesnt exist</p>
  <?php } ?>
</div>

<?php include('templates/footer.php') ?>