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

if (!function_exists('get_tipo_registro')) {
    function get_tipo_registro($tipo)
    {
        $label = "";
        switch ($tipo) {
            case 1:
                $label = '<button class="btn btn-primary disabled">Preventiva</button>';
                break;
            case 2:
                $label = '<button class="btn btn-warning disabled">Corretiva</button><br>';
                break;
            case 3:
                $label = '<button class="btn btn-danger disabled">Urgente</button><br>';
                break;
            default:
                $label = '<button class="btn btn-primary disabled">Preventiva</button><br>';
                break;
        }
        return $label;
    }
}
