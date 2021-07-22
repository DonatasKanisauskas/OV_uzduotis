<?php 

  include('config/db_connect.php');

  $data = ["name" => "", "pass" => "", "pass2" => "", "email" => ""];
  $errors = ["name" => "", "pass" => "", "pass2" => "", "email" => ""];

  if(isset($_POST['register'])){
    $data['name'] = htmlspecialchars($_POST['name']);
    $data['pass'] = htmlspecialchars($_POST['pass']);
    $data['pass2'] = htmlspecialchars($_POST['pass2']);
    $data['email'] = htmlspecialchars($_POST['email']);
    
    if(empty($_POST['name'])) $errors['name'] = "Username is required!";
    elseif(strlen($_POST['name']) < 4 || strlen($_POST['name']) > 20) {
      $errors['name'] = "Username must be between 4 and 20 letters long!";
    } elseif(!preg_match('/^[a-zA-Z0-9]+$/i', $_POST['name'])){
      $errors['name'] = "Username may only contain letters and number!";
    }
    
    if(empty($_POST['pass'])) $errors['pass'] = "Password is required!";
    elseif($_POST['pass'] !== $_POST['pass2']) $errors['pass2'] = "Passwords do not match!";
    elseif(strlen($_POST['pass']) < 8 || strlen($_POST['pass']) > 25 ) {
      $errors['pass'] = "Password must be between 8 and 25 letters long!";
    }

    if(empty($_POST['email'])) $errors['email'] = "Email is required!";
    elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
      $errors['email'] = "Email isn't valid!";
    }

    if(!array_filter($errors)){
      //register
      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $pass = mysqli_real_escape_string($conn, $_POST['pass']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);

      $sql = "INSERT INTO users(name,pass,email) VALUES('$name','$pass','$email')";

      if(mysqli_query($conn, $sql)) header('Location: index.php');
      else echo mysqli_error($conn);
    }
  }
?>

<?php require("templates/header.php"); ?>
<div class="content">
  <h3>Register</h3>
  <form action="register.php" method="POST">

    <div class="p-5">
      <label for="name">Username: </label>
      <input type="text" name="name" value="<?php echo htmlspecialchars($data['name']) ?>">
      <p class="error"><?php echo $errors['name'] ?></p>
    </div>
    
    <div class="p-5">
      <label for="pass">Password: </label>
      <input type="password" name="pass" value="<?php echo htmlspecialchars($data['pass']) ?>">
      <p class="error"><?php echo $errors['pass'] ?></p>
    </div>
    
    <div class="p-5">
      <label for="pass2">Repeat password: </label>
      <input type="password" name="pass2" value="<?php echo htmlspecialchars($data['pass2']) ?>">
      <p class="error"><?php echo $errors['pass2'] ?></p>
    </div>
    
    <div class="p-5">
      <label for="email">Email: </label>
      <input type="text" name="email" value="<?php echo htmlspecialchars($data['email']) ?>">
      <p class="error"><?php echo $errors['email'] ?></p>
    </div>
    
    <div>
      <input type="submit" name="register" value="register" class="btn">
    </div>
    
  </form>
</div>
<?php require("templates/footer.php"); ?>