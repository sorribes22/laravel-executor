<?php

namespace Axsor\Tests\Unit;

use Axsor\Executor\Facades\Executor;
use Axsor\Executor\Tests\ExecutorTestCase;

class ExecutorTest extends ExecutorTestCase
{
    /** @test */
    public function can_run_command()
    {
        $return = null;
        $result = Executor::run('echo ""', $return);

        $this->assertEquals(0, $return);
        $this->assertEquals('', $result);
    }

    /** @test */
    public function can_fake_result_and_return()
    {
        Executor::shouldReceive('run')->with('ping google.com', 4)->once()->andReturn('PING google.com (172.217.17.14) 56(84) bytes of data.
64 bytes from mad07s09-in-f14.1e100.net (172.217.17.14): icmp_seq=1 ttl=51 time=25.9 ms');

        $result = 4;
        $return = Executor::run('ping google.com', $result);

        $this->assertEquals(4, $result);
        $this->assertEquals('PING google.com (172.217.17.14) 56(84) bytes of data.
64 bytes from mad07s09-in-f14.1e100.net (172.217.17.14): icmp_seq=1 ttl=51 time=25.9 ms', $return);
    }
}
