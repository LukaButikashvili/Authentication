<!DOCTYPE html>
<html lang="en">
<?php 
    include "./component/head.php";
?>
<body>
    <?php 
        include_once "./component/navigation.php"
    ?>
    <?php 
        if(!isset($_SESSION['username'])): 
    ?>
        <h1>you are not authenticated, so please go and login into website from <a href="./index.php"> here </a></h1>
    <?php else: 
        include 'authentication.php';

        if(!empty($_POST)) {
            logout();
            redirect('index.php', 302);
        }
        $name = $_SESSION['username'];
    ?>
        <main class="userpage-main">
            <h1>Hello <?php echo $name ?> </h1>
            <form action="userPage.php" method="POST" class="logout-form">
                <input type="submit" value="Logout" name="log out" class="logout-input"/>
            </form>
        </main>
    <?php endif ?>
</body>
</html>



