<?php

if (!function_exists('dv_arr')) {
    function dv_arr($vars, $label = '', $return = false)
    {
        if (ini_get('html_errors')) {
            $content = "<pre>\n";
            if ($label != '') {
                $content .= "<strong>{$label} :</strong>\n";
            }
            $content .= htmlspecialchars(print_r($vars, true));
            $content .= "\n</pre>\n";
        } else {
            $content = $label . " :\n" . print_r($vars, true);
        }
        if ($return) {
            return $content;
        }
        echo $content;
        return null;
    }
}

if (!function_exists('dv')) {
    function dv($value, $tag = 'dv')
    {
        if (APP_DEBUG) {
            if (is_array($value)) {
                echo $tag ? $tag . ':<br>' : '';
                dv_arr($value);
                echo "----------------------<br>";
            } else {
                if ($tag) {
                    echo '<font color=blue>' . $tag . '=' . $value . '</font><br>';
                } else {
                    echo '<font color=blue>' . $value . '</font><br>';
                }
            }
        }
    }
}
if (!function_exists('dd')) {
    function dd($value, $tag = 'dv')
    {
        dv($value, $tag);
        die();
    }
}