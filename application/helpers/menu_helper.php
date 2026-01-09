<?php

function active($uri)
{
    $CI = &get_instance();
    return strpos($CI->uri->uri_string(), $uri) !== false ? 'active bg-primary' : '';
}
