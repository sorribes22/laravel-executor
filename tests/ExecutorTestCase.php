<?php

namespace Axsor\Executor\Tests;

class ExecutorTestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return ['Axsor\Executor\ExecutorServiceProvider'];
    }
}
