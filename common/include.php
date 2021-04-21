<?php

function include_template($template_name, $variable = null) {
    if(is_null($variable)) {
        include_once $variable;
    }

    include_once $template_name;
}