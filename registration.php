<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<style>
 h1 {
  text-align: center;
}
h2 {
  text-align: center;
}
h3 {
  text-align: center;
}
h5 {
  text-align: center;
}
    </style>
<body>
<figure><center><img src="lcb.jpg" style="width:200px;height:200px;"></center></figure>
<?php
    require('db2.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, email, create_datetime)
                     VALUES ('$username', '$password', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <h5><p class='link'>Click here to <a href='login.php'>Login</a></p></h5>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
 <h2>  <p><input type="text" class="login-input" name="username" placeholder="Username" required /></p>
        <p><input type="text" class="login-input" name="email" placeholder="Email Adress"></p>
        <p><input type="password" class="login-input" name="password" placeholder="Password"></p>
        <p><input type="submit" name="submit" value="Register" class="login-button"></p>
        <p class="link"><a href="login.php">Click to Login</a></p> </h2>

    </form>
<?php
    }
?>
</body>
</html>