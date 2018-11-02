<?php
session_start();

if (isset($_POST['email']) && isset($_POST['password'])){

    $servername = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b6145398a15a30";
    $password = "8be317d7";
    $dbname = "heroku_823f7648ae34667";


    $e_mail = htmlspecialchars($_POST["email"]);
    $pass_word = htmlspecialchars($_POST["password"]);

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM Users WHERE Email =:e_mail AND Pass =:pass_word");
        $stmt ->bindParam(':e_mail',$e_mail);
        $stmt ->bindParam(':pass_word', $pass_word);
        $stmt->execute();
        $results = $stmt->fetch();
        if($stmt->rowCount() == 1 ){
                echo "valid";
                $_SESSION['username'] = $_POST["email"];
                header('location: index.php');
            }
            else {
                echo "Didn't match!";
            }
        }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }

    $conn = null;
}
?>
    


