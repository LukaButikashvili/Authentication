<?php


function deleteUser($array, $username) {
    $new_data = [];
    foreach($array as $user) {
        if($user['username'] !== $username) {
            array_push($new_data, $user);
        }
    };
    return $new_data;
}

?>