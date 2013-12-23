<?php
require("includes/connection.php");

function get_name()
{
  global $connection; // conexiunea la baza de date trebuie existe in interiorul functiei. deci importata cu global;

  $uid = $_SESSION['uid'];
  $query = ' select first_name, last_name FROM users WHERE uid = '.$uid.'';
  $result = mysqli_query($connection, $query);
  $d = mysqli_fetch_assoc($result);
  $name = $d["first_name"] . ' ' . $d["last_name"];

  return $name;
}

function is_logged()
{
  if (isset($_SESSION['uid'])) {
    return 1;
  } else {
    return 0;
  }
}

	session_start();
	$name = '';
	if (is_logged()) { // daca este logat, ii extragem numele din baza de date
  		$name = get_name();
  		$name = ', ' . $name; 
 	} 
	
?>

<html>
<head>
	<title></title>
</head>
<body>
<h3>Bine-ai venit<?php echo  $name ?>!</h3>

<br /><br />

<?php if (is_logged()) { 
	echo '<a href="logout.php">Logout</a>';
   } else { 
   	echo '<a href="login.php">Login</a>';
  		} 
 ?>
</body>
</html>