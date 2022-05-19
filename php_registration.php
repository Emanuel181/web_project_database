<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="styles\style_registration.css"/>
</head>

<body>
    <div class="divStyle">
      <?php
      include "php_connection.php";

      if (isset($_REQUEST['username'])) {
          $username=stripslashes($_REQUEST['username']);
          $username=mysqli_real_escape_string($con, $username);
          $email=stripslashes($_REQUEST['email']);
          $email=mysqli_real_escape_string($con, $email);
          $password=stripslashes($_REQUEST['password']);
          $password=mysqli_real_escape_string($con, $password);
          $query="INSERT into `accounts` (username, password, email) VALUES ('$username', '" . md5($password) . "', '$email')";
          $result=mysqli_query($con, $query);
          if ($result) {
              echo "<div>
                    <h3>You are registered successfully.</h3><br/>
                    <p>Click here to <a href='php_login.php'>login</a></p>
                    </div>";
          } else {
              echo "<div>
                    <h3>The required fields are missing.</h3><br/>
                    <p>Click here to <a href='php_registration.php'>registrate</a> again.</p>
                    </div>";
          }
      }
      else
      {
      ?>
      <table>
        <form action="" method="post">
            <h1>Registration</h1>
            <tr>
              <td>
                <input type="text"name="username" placeholder="Username" required />
              </td>
            </tr>
            <tr>
              <td>
                <input type="text" name="email" placeholder="Email" required />
              </td>
            </tr>
            <tr>
              <td>
                <input type="password" name="password" placeholder="Password" required />
              </td>
            </tr>
            <tr>
              <td>
                <input type="submit" name="submit" value="Register">
              </td>
            </tr>
        </form>
      </table>

      <p>Already having an account?</p>
      <a href="php_login.php" class="login">Click to login</a>

      <?php
        }
      ?>
    </div>

</body>
</html>
