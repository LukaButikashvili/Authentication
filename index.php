<!DOCTYPE html>
<html lang="en">
<?php 
    include "./common/include.php";
    include_template('head.php', ['name' => 'Home'], true);
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
    <main class="mainpage-main">
        <a href="login.php" >
            <div>
                <h1>
                    SignIn
                </h1>
            </div>
        </a>
        <a href="./registration.php" >
            <div>
                <h1>
                    SignUp
                </h1>
            </div>
        </a>
    </main>
    <?php else: print_r($_POST); ?>
    <?php endif ?>
    <?php
        include_template('footer.php');
    ?>
</body>
</html>