<?php

use Illuminate\Support\Carbon;

if (!function_exists('data_br')) {
    function data_br($timestamp)
    {
        return Carbon::createFromFormat('Y-m-d', $timestamp)->format('d/m/Y');
    }
}

if (!function_exists('data_br_hora')) {
    function data_br_hora($timestamp)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $timestamp)->format('d/m/Y H:i:s');
    }
}
