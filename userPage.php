<!DOCTYPE html>
<html lang="en">
<?php 
    session_start();
    include "./common/include.php";
    include_template('head.php', ['name' => 'UserPage'], true);
?>
<body>
    <?php 
        if(isset($_SESSION['username'])) {
            $session_array = ['username' => $_SESSION['username']];
            include_template('navigation.php', $session_array, true);
        } else {
            include_template('navigation.php');
        }
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
    <?php
        include_template('footer.php');
    ?>
</body>
</html>



