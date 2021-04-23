<!DOCTYPE html>
<html lang="en">
<?php 
    include "./common/include.php";
    include_template('head.php', ['name' => 'Login'], true);
?>
<body>
    <?php 
        session_start();
        if(isset($_SESSION['username'])) {
            $session_array = ['username' => $_SESSION['username']];
            include_template('navigation.php', $session_array, true);
        } else {
            include_template('navigation.php');
        }
    ?>
    <?php if(empty($_POST)): ?>
        <main class="login-main">
            <h1>Log in</h1>
            <form action="login.php" method="POST" class="login-form">
                <input type="text" name="username" placeholder="Username" require/>
                <input type="password" name="password" placeholder="Password" require/>
                <input type="submit" value="Log In" class="login-submit-input" />
            </form>
        </main>
    <?php else: 
        include_once 'authentication.php'; 
        login($_POST['username'], $_POST['password']);
    ?>
    <?php endif ?>
    <?php
        include_template('footer.php');
    ?>
</body>
</html>