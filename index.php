<!DOCTYPE html>
<html lang="en">
<?php 
    include_once "./component/head.php";
?>
<body>
    <?php 
        include_once "./component/navigation.php"
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
</body>
</html>