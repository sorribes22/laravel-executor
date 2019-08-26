# Laravel executor
[![Build Status](https://travis-ci.org/sorribes22/laravel-executor.svg?branch=master)](https://travis-ci.org/sorribes22/laravel-executor)
[![StyleCI](https://github.styleci.io/repos/204448361/shield?branch=master)](https://github.styleci.io/repos/204448361)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/sorribes22/laravel-executor/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/sorribes22/laravel-executor/?branch=master)

Laravel executor is a very simple facade to [system](https://www.php.net/manual/es/function.system.php) PHP command.
It makes possible to [mock](https://laravel.com/docs/5.8/mocking#mocking-facades)
the result of the command execution without run it using a [facade](https://laravel.com/docs/5.8/facades)

## Installation
Install it via composer:

`composer require axsor/laravel-executor`

If you are using Laravel 5.4 or lower you must add ExecutorServiceProvider to
your `config/app.php`:

```php
'providers' => [
    Axsor\Executor\ExecutorServiceProvider::class,
],
```

Higher versions will [auto-discover](https://medium.com/@taylorotwell/package-auto-discovery-in-laravel-5-5-ea9e3ab20518) it.

## How to use
```php
use Axsor\Executor\Facades\Executor;

class MyTests extends TestCase
{
    public function test_my_functionality()
    {
        Executor::shouldReceive('run')->with('ping google.com', 1)->once()->andReturn("PING google.com (172.217.17.14) 56(84) bytes of data.
        64 bytes from mad07s09-in-f14.1e100.net (172.217.17.14): icmp_seq=1 ttl=51 time=25.9 ms");
        
        $result = 1;
        $return = Executor::run('ping google.com', $result);
        
        $this->assertEquals(1, $result);
        $this->assertEquals("PING google.com (172.217.17.14) 56(84) bytes of data.
64 bytes from mad07s09-in-f14.1e100.net (172.217.17.14): icmp_seq=1 ttl=51 time=25.9 ms", $return);
    }
}
```

## License
[GPL-3.0](./LICENSE)

