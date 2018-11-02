<header>
    <logo>
        <a href="index.php"><img src="logo.JPG"></a>
    </logo>

    <h2>COLLEGE EXCHANGE</h2>
    <h5>Account: <?php echo $_SESSION['username'];?></h5>
    <nav>
        <ul>
            <li class="<?php if ($page=='help'){echo 'active';}?>"><a href="help.php">Help</a></li>
            <li class="<?php if ($page=='signout'){echo 'active';}?>"><a href="signout.php">Sign Out</a></li>
            <li class="<?php if ($page=='myProducts'){echo 'active';}?>"><a href="getMyProducts.php">My Products</a></li>
            <li class="<?php if ($page=='enlist'){echo 'active';}?>"><a href="enlist.php">Enlist</a></li>

        </ul>
    </nav>

</header>

