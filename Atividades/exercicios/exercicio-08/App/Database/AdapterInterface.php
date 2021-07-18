<?php

namespace App\Database;

interface AdapteterInterface
{
    public function open();
    public function close();
    public function get();
}
