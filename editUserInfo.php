<!DOCTYPE html>
<html lang="en">
<?php 
    include_once "./component/head.php";
?>
<body>
    <?php 
        include_once "./component/navigation.php";
        include_once "./common/readusers.php";
        $users = read_users("./data/users.json");
        $username = $_COOKIE['username'];
        $user_info = [];
        foreach($users as $user) {
            if($user['username'] === $username) {
                array_push($user_info, $user);
            }
        }
        foreach($user_info as $info):
    ?>
    <form method="POST">
        <input type="text" name="firstname" value=<?php echo $info['firstname'] ?> >
        <input type="text" name="lastname" value=<?php echo $info['lastname'] ?> >
        <input type="text" name="username" value=<?php echo $info['username'] ?> >
        <input type="submit" value="edit" />
    </form>
    <?php
        endforeach;
        include_once './common/redirect.php';
        include_once "./deleteUser.php";

        if(!empty($_POST)){
            $new_data = deleteUser($users, $username);
            $updated_user = $_POST;
            array_push($new_data, $updated_user);
            $json_data = json_encode($new_data);
            file_put_contents('data/users.json', $json_data);
            setcookie('username', '', time() - 4200);
            redirect('users.php', 302);
        }
    ?>
</body>
</html>