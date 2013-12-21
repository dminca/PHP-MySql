<?php
require("includes/connection.php");

$error = null;
if (isset($_POST["submit"])) {
  
  $username = $_POST["username"];
  $password = $_POST["password"];

  if (!$username or !$password) {
    $error = 1;
  }


  if (!$error) {
  
  $username = mysqli_real_escape_string($connection,$username);
  $password = sha1($password); // in baza de date va fi stocat hash-ul parolei, nu parola insasi

  $query = 'SELECT uid, username FROM users WHERE username = "'.$username.'" AND password = "'.$password.'" ';
  //echo $query;
  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

  if (mysqli_num_rows($result) == 1) {
    // do login
    session_start();
    $d = mysqli_fetch_assoc($result);
    $_SESSION['uid'] = $d["uid"];
    //$_SESSION['username'] = $d["username"];
    //$_SESSION['loggedin']=time();

    header('Location:welcome.php');
  } else {
    $error = 1;
  }

  } /// if !$error


  if ($error) {
    $error = 'Username sau parola invalida';
  }


 } /// end if ...submit

//html_start();  output-ul programului abia aici incepe. dupa session_start()...
?>

<html>
	<head><title></title></head>
<body>
<h3>Login</h3>
<br /><br />
<?php
if (isset($error)) {
  echo '<div>' . $error . '</div>';
  echo '<br />';
 }
?>
<form method="post" action="login.php">
  Username: <input type="text" name="username" value="" /> <br />
  Password: <input type="password" name="password" value="" />
<br /><br />
<input type="submit" name="submit" value="Login" />
</form>


</body>
</html>