<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;

if (!function_exists('data_br')) {
    function data_br($timestamp)
    {
        return Carbon::createFromFormat('Y-m-d', $timestamp)->format('d/m/Y');
    }
}

if (!function_exists('menu_ativado')) {
    function menu_ativado($route)
    {
        if (strpos(Route::currentRouteName(), $route) === 0) {
            return 'active';
        } else {
            return '';
        }
    }
}

if (!function_exists('menu_open')) {
    function menu_open($route)
    {
        if (strpos(Route::currentRouteName(), $route) === 0) {
            return 'menu-open';
        } else {
            return '';
        }
    }
}
