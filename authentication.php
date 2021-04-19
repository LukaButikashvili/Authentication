<?php

const USER_FILE = "./data/users.json";

//fetch data from json file
function read_users() {
    if(!file_exists(USER_FILE)) {
        print "Users database not found.";
        die(1);
    }
    $fetch_users = file_get_contents(USER_FILE);
    return json_decode($fetch_users, true);
}

function login(string $username, string $password) {
    $users = read_users();
    foreach($users as &$list) {
        if($list['username'] === $username) {
            $password_check = password_verify($password, $list['password']);

            if($password_check) {
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                redirect('./userPage.php', 302);
            } else {
                echo '<script>alert("invalid credentials")</script>';
                header("Refresh:0");
                die(1);
            }
        }
    } 

    
    echo '<script>alert("invalid credentials")</script>';
    header("Refresh:0");
    die(1);


}

function register($firstname, $lastname, $username, $password) {
    $users_array = read_users();

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $user_data = [
        "firstname" => $firstname,
        "lastname" => $lastname,
        "username" => $username,
        "password" => $hashed_password
    ];

    //checking if username is already exist in data
    foreach($users_array as &$list) {
        if($list['username'] === $username) {
            echo '<script>alert("username already exist, please choose other username")</script>';
            header("Refresh:0");
            die(1);
        }
    }

    //updating json data
    array_push($users_array, $user_data);
    $json_data = json_encode($users_array);
    file_put_contents('./data/users.json', $json_data);

    //redirect user to his/her page
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    redirect('userPage.php', 302);
    die(0);

}

function logout() {
    session_start();

    session_unset();
    session_destroy();
    
    $cookie_params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 2000, $cookie_params['path'], $cookie_params['$domain'], $cookie_params['secure'], $cookie_params['httonly']);

}

function redirect(string $url, int $statuscode) {
    $path = $_SERVER["REQUEST_URI"];
    $str_arr = explode ("/", $path);
    $redirection_path = 'http://' . $_SERVER["HTTP_HOST"] . '/' . $str_arr[1] . '/' . $url;

    header("Location: $redirection_path");
    http_response_code($statuscode);
}