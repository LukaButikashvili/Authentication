<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
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
</body>
</html>