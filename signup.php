<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'accountdata';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if(! $conn ) {
    die('Could not connect: ' . mysqli_error($conn));
}

// echo 'Connected successfully<br>';

$user_name = $password =$PassErr="";
if(!empty($_POST['Submit'])){
		if($_POST['password']===$_POST['cpassword']){
$user_name = $_POST['name'];
$password = $_POST['password'];
$sign_up = "INSERT INTO user_data(user_name,pass) 
            VALUES ('$user_name','$password')";

 $retval = mysqli_query( $conn,$sign_up );
header("Location: index.php");
}else{
$PassErr = "Password didn't Match";
}}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Sign Up</h1>
    <p>Please fill this form to create an account</p>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="name" value="" Required>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" value="" Required>
		</div>
        <div class="input-group">
			<label>Confirm Password</label>
			<input type="password" name="cpassword" value="" Required>
        </div>
		<div>
			<input class="sbtn" type="submit" name="Submit" >
			<input class="rbtn" type="reset" name="Reset" ><span style="color: red;"> <?php echo "$PassErr";?></span>
		</div>
	</form>
    <div class="input-group">
		Already have an account? <a href="index.php">login here</a>
    </div>
</body>
</html>


