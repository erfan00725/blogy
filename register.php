<?php
declare(strict_types=1);

require "./config.php";

if (isset($_POST['submit'])) {
    if (isset($_POST['user']) AND isset($_POST['email']) AND isset($_POST['pass']) AND isset($_POST['passConfirm'])) {

      if ($_POST['pass'] === $_POST['passConfirm']) {
        $stmnt = $connection->prepare(
          "INSERT INTO users (user, email, pass) VALUES (:user, :email, :pass)"
        );
  
        try{
          $stmnt->execute([
            'user' => $_POST['user'],
            'email' => $_POST['email'],
            'pass' => password_hash($_POST['pass'], PASSWORD_BCRYPT, ['cost' => 12])
          ]);
          echo "user created successfully!";
        }catch(\Throwable $th){
          echo $th->getMessage();
        }
      }else{
        echo "passwords do not match";
      }

    }else{
        echo "all fields reqiered";
    }
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
  <form method="POST" action="register.php" class="login-form">
    <h1>Welcome Back</h1>
    <p>Please login to your account</p>
    <div class="input-group">
      <input name="user" type="text" id="username" placeholder="Username" required>
    </div>
    <div class="input-group">
      <input name="email" type="text" id="username" placeholder="email@email.com" required>
    </div>
    <div class="input-group">
      <input name="pass" type="password" id="password" placeholder="Password" required>
    </div>
    <div class="input-group">
      <input name="passConfirm" type="password" id="password" placeholder="Confirm password" required>
    </div>
    <button name="submit" type="submit">Login</button>
    <div class="bottom-text">
      <p>Don you have an account? <a href="login.php">Login</a></p>
      <p><a href="#">Forgot password?</a></p>
    </div>
  </form>
</div>
<?php require "./partials/_footer.php"?>

</body>
</html>