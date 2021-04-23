<!DOCTYPE html>
<html lang="en">
<?php 
    include "./common/include.php";
    include_template('head.php', ['name' => 'Registration'], true);
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
        <main class="registration-main">
            <h1>Registration</h1>
            <form action="registration.php" method="POST">
                <input type="text" name="firstname" placeholder="Firstname" require/>
                <input type="text" name="lastname" placeholder="Lastname" require/>
                <input type="text" name="username" placeholder="Username" require/>
                <input type="password" name="password" placeholder="Password" require/>
                <input type="submit" value="Register" />
            </form>
        </main>
    <?php else: 
        include_once 'authentication.php'; 
        register($_POST['firstname'], $_POST['lastname'], $_POST['username'], $_POST['password']);
    ?>
    <?php endif ?>
    <?php
        include_template('footer.php');
    ?>
</body>
</html>