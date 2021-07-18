<?php

namespace App\Database;

use App\Database\ApadaterInterface;

class Connection
{
    private $adapter;

    public function __construct(AdapteterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    public function getAdapter()
    {
        return $this->adapter;
    }
}
