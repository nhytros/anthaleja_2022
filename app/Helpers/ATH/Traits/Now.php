<?php

namespace App\Helpers\ATH\Traits;

trait Now
{
    public static function now()
    {
        $class = get_called_class();
        return new $class('now');
    }
}
