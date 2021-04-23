<?php

function get_config() {
    return json_decode(file_get_contents('config/config.json'), true);
}

function include_template($template_name, $variable = [], $print = true) {
    $output = null;

    $component_path = get_config()['component-path'];
    $file_path = $component_path . '/' . $template_name;

    if(file_exists($file_path)) {
        extract($variable);

        ob_start();

        include $file_path;
        $output = ob_get_contents();

        ob_end_clean();
    }

    if($print) {
        echo $output;
    }

    return $output;
}