<?php
session_start();

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

    &nbsp;
</header>

<div class="wrapper">

    <form class="form-signin" action="login.php" method="post">
        <h2 class="form-signin-heading">Login Here</h2>
        <input type="text" class="form-control" name="email" placeholder="Email Address" required="" autofocus="" />
        <input type="password" class="form-control" name="password" placeholder="Password" required=""/>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        <div><p>
                <?php
                if(isset($_SESSION['loginError']))
                {
                    echo $_SESSION['loginError'];
                    unset($_SESSION['loginError']);
                }
                ?>

         </p></div>
    </form>

    <form class="form-signup" action="signup.php" method="post">
        <h5 class="form-signin-heading">Don't have account?</h5>
        <h2 class="form-signin-heading">Signup Here</h2>
        <input type="text" class="form-control" name="firstName" placeholder="First Name" required="" autofocus="" value="<?php if(isset($_SESSION['firstName'])) {echo $_SESSION['firstName'];}?>"/>
        <input type="text" class="form-control" name="lastName" placeholder="Last Name" required="" autofocus="" value="<?php if(isset($_SESSION['lastName'])) {echo $_SESSION['lastName'];}?>"/>
        <input type="text" class="form-control" name="email" placeholder="Email Address" required="" autofocus="" value="<?php if(isset($_SESSION['email'])) {echo $_SESSION['email'];}?>"/>
        <input type="password" class="form-control" name="password" placeholder="Password" required=""/>
        <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password" required=""/>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Signup</button>
        <div><p>
                <?php
                if(isset($_SESSION['signupError']))
                {
                    echo $_SESSION['signupError'];
                    unset($_SESSION['signupError']);
                }

                if(isset($_SESSION['signupSuccess']))
                {
                    echo $_SESSION['signupSuccess'];
                    unset($_SESSION['signupSuccess']);
                }

                ?>

            </p></div>
    </form>
</div>
<footer>
    <h2>About college exchange</h2>
    <p>This website is intended for college students to trade in their items.</p>
</footer>

<?php

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
                $_SESSION['username'] = $_POST["email"];



                header('location: index.php');

            }
            else {
                $_SESSION['loginError'] = "Invalid Credentials. Please try again";
                header('location: index.php');
            }
        }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }

    $conn = null;
}


?>
    


