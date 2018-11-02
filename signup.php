<html>
<body>
<?php
$servername = "us-cdbr-iron-east-01.cleardb.net";
$username = "b6145398a15a30";
$password = "8be317d7";
$dbname = "heroku_823f7648ae34667";

    
$First_Name = htmlspecialchars($_POST["firstName"]);
$Last_Name = htmlspecialchars($_POST["lastName"]);
$E_mail = htmlspecialchars($_POST["email"]);
$Pass_word = htmlspecialchars($_POST["password"]);

//if(empty($First_Name) || empty($Last_Name) || empty($E_mail) || empty($Pass_word)){
//    header('Location: login.php?signup=empty');
//}
//else{
//    if(!filter_var($E_mail, FILTER_VALIDATE_EMAIL)){
//        header('Location: login.php?signup=invalidEmail');
//    }
//}



try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO Users (FirstName, LastName, Email, Pass)    
    VALUES ('$First_Name', '$Last_Name', '$E_mail', '$Pass_word')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
header('Location: login.php');
?>
    
</body>
</html>

