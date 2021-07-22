<?php 

  include('config/db_connect.php');

  $data = ["title" => "", "content" => ""];
  $errors = ["title" => "", "content" => ""];

  if(isset($_POST['article'])){
    $data['title'] = htmlspecialchars($_POST['title']);
    $data['content'] = htmlspecialchars($_POST['content']);
    
    if(empty($_POST['title'])) $errors['title'] = "Title is required!";
    elseif(strlen($_POST['title']) < 10 || strlen($_POST['title']) > 30 ) {
      $errors['title'] = "Title must be between 10 and 30 letters long!";
    }

    if(empty($_POST['content'])) $errors['content'] = "Content is required!";
    elseif(strlen($_POST['content']) < 20 || strlen($_POST['content']) > 255 ) {
      $errors['content'] = "Content must be between 20 and 255 letters long!";
    }

    if(!array_filter($errors)){
      
      $uuid = 1; // get UUID from SESSION
      $title = mysqli_real_escape_string($conn, $_POST['title']);
      $content = mysqli_real_escape_string($conn, $_POST['content']);

      $sql = "INSERT INTO articles(uuid,title,content) VALUES('$uuid','$title','$content')";

      if(mysqli_query($conn, $sql)) header('Location: index.php');
      else echo mysqli_error($conn);
    }
  }
?>

<?php require("templates/header.php"); ?>
<div class="content">
  <h3>Article editor</h3>
  <form action="new_article.php" method="POST">
    
    <div class="p-5">
      <label for="title">Title: </label>
      <input type="text" name="title" value="<?php echo htmlspecialchars($data['title']) ?>">
      <p class="error"><?php echo $errors['title'] ?></p>
    </div>
    
    <div class="p-5 textfield">
      <label for="content">Content: </label>
      <textarea type="text" name="content" cols="70" rows="15"><?php echo htmlspecialchars($data['content']) ?></textarea>
      <p class="error"><?php echo $errors['content'] ?></p>
    </div>
    
    <div class="p-5 mt-10">
      <input type="submit" name="article" value="POST" class="btn">
    </div>
    
  </form>
</div>
<?php require("templates/footer.php"); ?>