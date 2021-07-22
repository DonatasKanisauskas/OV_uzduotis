<?php 

  include('config/db_connect.php');

  $data = ["email" => "", "pass" => ""];

  if(isset($_POST['login'])){
    $data['email'] = htmlspecialchars($_POST['email']);
    $data['pass'] = htmlspecialchars($_POST['pass']);

    if(in_array("", $data)){
      echo "Please fill up all fields!";
    } else {
      echo "trying to login";
      // $email = mysqli_real_escape_string($conn, $_POST['email']);
      // $pass = mysqli_real_escape_string($conn, $_POST['pass']);

      // $sql = "INSERT INTO users(name,pass,email) VALUES('$name','$pass','$email')";

      // if(mysqli_query($conn, $sql)) {
      //   // SESSION
      //   header('Location: index.php');
      // } else echo mysqli_error($conn);
    }
  }
?>

<?php require("templates/header.php"); ?>
<div class="content">
  <h3>Login</h3>
  <form action="login.php" method="POST">
    
    <div class="p-5">
      <label for="email">Email: </label>
      <input type="text" name="email" value="<?php echo htmlspecialchars($data['email']) ?>">
    </div>
    
    <div class="p-5">
      <label for="pass">Password: </label>
      <input type="password" name="pass" value="<?php echo htmlspecialchars($data['pass']) ?>">
    </div>
    
    <div>
      <input type="submit" name="login" value="login" class="btn">
      <a href="register.php">Register</a>
    </div>
    
  </form>
</div>
<?php require("templates/footer.php"); ?>