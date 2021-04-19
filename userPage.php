<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <?php 
        session_start();
        if(!isset($_SESSION['username'])): 
    ?>
        <h1>you are not authenticated, so please go and login into website from <a href="./index.php"> here </a></h1>
    <?php else: 
        include 'authentication.php';
        if(!empty($_POST)) {
            logout();
            redirect('index.php', 302);
        }
    ?>
        <main class="userpage-main">
            <h1>Hello</h1>
            <form action="userPage.php" method="POST" class="logout-form">
                <input type="submit" value="Logout" name="log out" class="logout-input"/>
            </form>
        </main>
    <?php endif ?>
</body>
</html>



