<?php

function thcfg_get_uri($admin)
{
    $params = $_GET;
    $params['thcfg_admin'] = $admin ? 1 : 0;
    foreach($params as $key => $value) {
        $query[] = $key . '=' . urlencode($value); 
    }
    return '?' . implode('&', $query);
}
