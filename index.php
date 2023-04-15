<?php
session_start();
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'accountdata';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$msg =$user_name=$password='';
if(!empty($_POST['login'])){
		$user_name = mysqli_real_escape_string($conn,$_POST['name']);
		$password = mysqli_real_escape_string($conn,$_POST['password']);
		$sql = mysqli_query($conn," SELECT * FROM user_data
		 						   WHERE user_name = '$user_name' && pass = '$password'");
	  $num =mysqli_num_rows($sql);
      if($num>0){
        $row = mysqli_fetch_assoc($sql);
        $_SESSION['USER_ID'] = $row['ID'];
        $_SESSION['USER_NAME'] = $row['user_name'];
        header('location: Home.php');
        exit();
		}else{
        $msg = "Please Enter Valid Data";
    	}		
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>LogIn</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>LogIn</h1>
    <p>Please fill in your credentials to login</p>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="name" value="" Required>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" value="" Required>
		</div>
		<div>
			<button class="sbtn" type="submit" name="login" value="submit">LogIn</button> <span style="color: red;"> <?php echo $msg;?></span>
		</div>
	</form>
    <div class="input-group">
		Don't have an account? <a href="signup.php">Sign up now.</a>
    </div>
</body>
</html>