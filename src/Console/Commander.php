<?php

namespace Orchestra\Testbench\Dusk\Console;

use Orchestra\Testbench\Console\Commander as Testbench;
use Orchestra\Testbench\Dusk\Foundation\TestbenchServiceProvider;

use function Illuminate\Filesystem\join_paths;

class Commander extends Testbench
{
    /**
     * The environment file name.
     *
     * @var string
     */
    protected string $environmentFile = '.env.dusk';

    /**
     * Resolve application implementation.
     *
     * @return \Closure(\Illuminate\Foundation\Application):void
     */
    #[\Override]
    protected function resolveApplicationCallback()
    {
        return static function ($app) {
            $app->register(TestbenchServiceProvider::class);
        };
    }

    /**
     * Get Application base path.
     *
     * @return string
     */
    #[\Override]
    public static function applicationBasePath()
    {
        return $_ENV['APP_BASE_PATH'] ?? realpath(join_paths(__DIR__, '..', '..', 'laravel'));
    }
}
