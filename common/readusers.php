<?php
//fetch data from json file
function read_users(string $url) {
    if(!file_exists($url)) {
        print "Users database not found.";
        die(1);
    }
    $fetch_users = file_get_contents($url);
    return json_decode($fetch_users, true);
}