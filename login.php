<?php
declare(strict_types=1);

require "./config.php";
require "./founctions.php";

if (isset($_POST['submit'])) {
    if (isset($_POST['user']) AND isset($_POST['pass'])) {

      $user = $_POST['user'];
      $pass = $_POST['pass'];

      $login = $connection->query("SELECT * FROM users WHERE user = '$user'");

      $login->execute();
  
      $data = $login->fetch(PDO::FETCH_ASSOC);
  
      if ($login->rowCount() > 0) {
        if (password_verify($pass, $data['pass'])) {
          sessionStart();

           $_SESSION['user'] = $data['user'];
           $_SESSION['role'] = $data['role'];
           $_SESSION['id'] = $data['id'];

           echo 'login succisfuly';

           header('Location: index.php');
          } else {
           echo 'user or password is incorrect';
          }
       } else {
         echo 'user or password is incorrect';
        }
      }else{
        echo "incorrect username or password";
      }

}else{
        echo "all fields reqiered";
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap5" />
    
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    
    
	<link rel="stylesheet" href="fonts/icomoon/style.css">
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    
	<link rel="stylesheet" href="css/tiny-slider.css">
	<link rel="stylesheet" href="css/aos.css">
	<link rel="stylesheet" href="css/glightbox.min.css">
	<link rel="stylesheet" href="css/style.css">
    
	<link rel="stylesheet" href="css/flatpickr.min.css">
    <link rel="stylesheet" href="./css/login.css">
    
    
    <title>login</title>
</head>
<body>
<?php require "./partials/_header.php"?>

<div class="login-container">
  <form method="POST" action="login.php" class="login-form">
    <h1>Welcome Back</h1>
    <p>Please login to your account</p>
    <div class="input-group">
      <input name="user" type="text" id="username" name="username" placeholder="Username" required>
    </div>
    <div class="input-group">
      <input name="pass" type="password" id="password" name="password" placeholder="Password" required>
    </div>
    <button name="submit" type="submit">Login</button>
    <div class="bottom-text">
      <p>Don't have an account? <a href="register.php">Sign Up</a></p>
      <p><a href="#">Forgot password?</a></p>
    </div>
  </form>
</div>
<?php require "./partials/_footer.php"?>

</body>
</html>