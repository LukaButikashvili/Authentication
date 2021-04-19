<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main page</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
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