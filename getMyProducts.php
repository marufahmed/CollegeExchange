<?php
session_start();

if(!isset($_SESSION['username']))
{
    header('location: login.html');
}

?>
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

<div>
    <?php
    echo "<table style='border: solid 1px black;'>";
    echo "<tr><th>ProductName</th><th>ProductCondition</th></tr>";
    class TableRows extends RecursiveIteratorIterator {
        function __construct($it) {
            parent::__construct($it, self::LEAVES_ONLY);
        }

        function current() {
            return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
        }

        function beginChildren() {
            echo "<tr>";
        }

        function endChildren() {
            echo "</tr>" . "\n";
        }
    }

    $servername = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b6145398a15a30";
    $password = "8be317d7";
    $dbname = "heroku_823f7648ae34667";

    $user= $_SESSION['username'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("select Products.ProductName, Products.ProductCondition from Products where Products.Email = '$user'");
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);


        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
            echo $v;
        }
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;

    echo "</table>"
    ?>
</div>

<?php include "footer.php" ?>
