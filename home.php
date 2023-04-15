
<?php
 session_start();
 if(isset($_SESSION['USER_ID']) && isset($_SESSION['USER_NAME'])){

?>
<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body style="width: 100%;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            flex-direction: column;">
    <header>
       <h3 style="text-align:center"><?php echo 'Hi <b>'.$_SESSION['USER_NAME'].'</b> Welcome to Our Site'?></h3>
    </header>
    <div>
        <img src="indexPage.jpg" alt="" style=" display: flex;
  margin-left: auto;
  margin-right: auto;
  width: 70% "/>
    </div>
    <div>
<a href="index.php" style="margin: 0 auto";><button type="button" class="btn btn-primary btn-lg" >Sign out of Your Account</button></a>
</div>
</body>


<?php
 }else{
    header('location:Login.php');
    exit();
 }
        ?>
</html>