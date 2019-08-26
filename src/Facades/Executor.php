<?php

namespace Axsor\Executor\Facades;

use Illuminate\Support\Facades\Facade;

class Executor extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'executor';
    }
}
