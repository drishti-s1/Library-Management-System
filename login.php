<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<style>
 h1 {
  text-align: center;
}
h3 {
  text-align: center;
}
</style>
<body>
<figure><center><img src="lcb.jpg" style="width:200px;height:200px;"></center></figure>
<?php
    require('db2.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . ($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: Homepage.html");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.<br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p></h3>
                  </div>";
        }
    } else {
?>
  <p>  <form class="form" method="post" name="login">
        <h1 class="login-title">Login</p>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/></p>
       <p> <input type="password" class="login-input" name="password" placeholder="Password"/></p>
       <p> <input type="submit" value="Login" name="submit" class="login-button"/></p>
        <p class="link"><a href="registration.php">New Registration</a></p></h1>
  </form>
<?php
    }
?>
</body>
</html>