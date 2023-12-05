<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="container">
      <div class="center">
          <h1>Register</h1>
          <form method="POST" action="/stack/register.php">
              <div class="txt_field">
                  <input type="text" name="name" id="name" required>
                  <span></span>
                  <label>Name</label>
              </div>
              <div class="txt_field">
                  <input type="email" name="email" id="email" required>
                  <span></span>
                  <label>Email</label>
              </div>
              <div class="txt_field">
                  <input type="password" name="password" id="password" required>
                  <span></span>
                  <label>Password</label>
              </div>
              <div class="txt_field">
                  <input type="password" name="cpassword" id="cpassword" required>
                  <span></span>
                  <label>Confirm Password</label>
              </div>
              <input name="submit" type="Submit" value="Sign Up">
              <div class="signup_link">
                  Have an Account ? <a href="login.php">Login Here</a>
              </div>
          </form>

          <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $cpassword = $_POST['cpassword'];

    $servername = "localhost";
    $username = "root";
    $pass = "";
    $database = "stack";
    $conn = mysqli_connect($servername, $username, $pass, $database);
    if (!$conn){
        die("Sorry we failed to connect: ". mysqli_connect_error());
    }
    
    elseif($password!=$cpassword){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Password dosent match </div>';
    }

    else{ 
      // $hashed = hash('sha512', $password);
      // $chashed = hash('sha512', $cpassword);
      $sql = "INSERT INTO `register` (`name`, `email`, `password`, `cpassword`) VALUES ('$name', '$email', '$password', '$cpassword');";
      $result = mysqli_query($conn, $sql);
      if($result){
        echo "<h1><center> Registration successful </center></h1>";
        // header("Location: http://localhost/stack/login.php");
      }
      else{
          echo "<h1><center> Registration unsuccessful.. try again </center></h1>";
      }
      
    }

  } 
?>

      </div>
  </div>
  </body>
</html>