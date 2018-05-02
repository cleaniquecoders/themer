<?php

namespace CleaniqueCoders\Themer\Tests;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Load Package Service Provider.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array List of Service Provider
     */
    protected function getPackageProviders($app)
    {
        return [
            \CleaniqueCoders\Themer\ThemerServiceProvider::class,
        ];
    }
}
