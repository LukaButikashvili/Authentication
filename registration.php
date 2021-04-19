<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <?php if(empty($_POST)): ?>
        <main class="registration-main">
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
</body>
</html>