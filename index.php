<?php
$errorMessage = ['name'=>'', 'email'=>'', 'password'=>''];
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    list($domain) = explode('@', $email);
    $isGmail = ($domain == 'gmail.com');

if(empty($name)){
    $errorMessage['name'] = "Please enter your name";
    }
elseif(!preg_match ("/^[a-zA-z]*$/", $name)){
    $errorMessage['name'] = "Only alphabets and whitespace are allowed.";
    }
if(empty($email))
{
    $errorMessage['email'] = "Please enter your email";
    }
elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) !== false){
    $errorMessage['email'] = "Please enter correct email format";
    }
elseif(!$isGmail){
    $errorMessage['email'] = "Only gmail id are allowed";
    }
if(empty($password)){
    $errorMessage['password'] = "Please enter a Password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
<div class="form-group">
  <label for="usr">Name:</label>
  <input type="text" class="form-control" id="usr" name="name">
  <span><?php echo $errorMessage['name']; ?></span>
</div>
  <div class="form-group">
    <label>Email address:</label>
    <input type="text" class="form-control"  autocomplete="" name="email">
    <span><?php echo $errorMessage['email']; ?></span>
  </div>
  <div class="form-group">
    <label>Password:</label>
    <input type="password" class="form-control" autocomplete="" name="password">
    <span><?php echo $errorMessage['password']; ?></span>
  </div>
  <button type="submit" name="submit" class="btn btn-default">Submit</button>
</form>
</div>
</body>
</html>