<?php

namespace Axsor\Executor;

class Executor
{
    public function run(string $command, &$return_val): string
    {
        return system($command, $return_val);
    }
}
