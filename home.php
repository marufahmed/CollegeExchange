<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>College Exchange</title>
<link rel="stylesheet" href="css/styles.css">
</head>
<body>



<header>
  <logo>
    <a href="index.php"><img src="logo.JPG"></a>
  </logo>

    <h2>COLLEGE EXCHANGE</h2>
    <h5>Account: <?php echo $_SESSION['username'];?></h5>
  <nav>
      <ul>
        <li><a href="help.php">Help</a></li>
        <li><a href="signout.php">Sign Out</a></li>
          <li><a href="getMyProducts.php">My Products</a></li>
        <li><a href="enlist.php">Enlist</a></li>
          
      </ul>
    </nav>
    
</header>

<div class='table'>
    <?php include 'getproduct.php';?>
</div>


<?php include "footer.php" ?>