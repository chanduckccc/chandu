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
          <h1>Login</h1>
          <form method="POST" action="/stack/login.php">
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
              <input name="submit" type="Submit" value="Sign Up">
              <div class="signup_link">
                  Don't have an Account ? <a href="register.php">Register Here</a>
              </div>
          </form>

          <?php
           error_reporting(0);
      $servername = "localhost";
      $username = "root";
      $pass = "";
      $database = "stack";
      $conn = mysqli_connect($servername, $username, $pass, $database);
      $email = $_POST['email'];
      $password = $_POST['password'];
      if (!$conn){
          die("Sorry we failed to connect: ". mysqli_connect_error());
      }
      else
      {
        
        $email = stripcslashes($email);  
        $password = stripcslashes($password);  
        $email = mysqli_real_escape_string($conn, $email);  
        $password = mysqli_real_escape_string($conn, $password);
        $sql = "select * from register where email = '$email' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
       
        if($count == 1){  
          header("Location: http://localhost/stack/profile/");
        }  
        else{  
            echo "<h1><center></center></h1>";
        }
      }
?>
      </div>
  </div>
  </body>
</html>