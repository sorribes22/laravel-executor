<?php

namespace Axsor\Executor;

use Illuminate\Support\ServiceProvider;

class ExecutorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('executor', function () {
            return new Executor();
        });
    }
}
