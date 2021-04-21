<?php

function redirect(string $url, int $statuscode) {
    $path = $_SERVER["REQUEST_URI"];
    $str_arr = explode ("/", $path);
    $redirection_path = 'http://' . $_SERVER["HTTP_HOST"] . '/' . $str_arr[1] . '/' . $url;

    header("Location: $redirection_path");
    http_response_code($statuscode);
}