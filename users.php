<!DOCTYPE html>
<html lang="en">
<?php 
    include_once "./component/head.php";
?>
<body>
    <?php 
        include_once "./component/navigation.php"
    ?>
    <div>
        <table style="width: 50%;">
            <tr>
                <th>Firstname</th>
                <th>Lastname</th> 
                <th>Username</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            <?php 
                include "./common/readusers.php";
                $users = read_users("./data/users.json");
                foreach($users as $user):
            ?>
            <tr>
                <td><?php echo $user['firstname'] ?></td>
                <td><?php echo $user['lastname'] ?></td>
                <td><?php echo $user['username'] ?></td>
                <form method="POST">
                    <td><input type="submit" value="delete" name=<?php echo $user['username'] ?>></td>
                    <td><input type="submit" value="edit" name=<?php echo $user['username'] ?>></td>
                </form>
            </tr>
            <?php endforeach ?>
            <?php 
                include "./common/redirect.php";
                include "./deleteUser.php";
                if(!empty($_POST)) {
                    $value = array_values($_POST)[0];  // method type (delete or edit)
                    $key = array_keys($_POST)[0]; //username
                    if($value === "delete") {
                        //returns data without the user
                        $new_data = deleteUser($users, $key);
                        $json_data = json_encode($new_data);
                        file_put_contents('/data/users.json', $json_data);
                        header("Refresh:0");
                    } else if ($value === "edit") {
                        redirect('editUserInfo.php', 302);
                        setcookie('username', $key);
                    }
                }
            ?>
        </table>
    </div>
    <?php include_once "./component/footer.php" ?>
</body>
</html>