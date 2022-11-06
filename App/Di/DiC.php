<?php

namespace App\Di;

use App\Router\Main;
use App\Models\CacheHandler\CacheHandler;
use App\Models\CacheHandler\FileHandler;
use App\Models\CacheHandler\RedisHandler;
use App\Models\EnvironmentProvider;
use App\Router\RouterResolver;
use Laminas\Di\Di;

class DiC
{
    protected $di;
    protected $envProvider;

    public function __construct(Di $di, EnvironmentProvider $envProvider)
    {
        $this->di = $di;
        $this->envProvider = $envProvider;
    }


    public function assemble()
    {
        $reflection = new \ReflectionClass($this);

        foreach ($reflection->getMethods(\ReflectionMethod::IS_PRIVATE) as $method) {
            $method->setAccessible(true);
            $method->invoke($this);
        }
    }

    private function assembleRouters()
    {
        $this->di->instanceManager()->setParameters(
            RouterResolver::class,
            [
                'routerMap' => [
                    RouterResolver::MAIN_ROUTER_KEY  => Main::class
                ]
            ]
        );
    }

    private function assembleFactory()
    {
        $this->di->instanceManager()->setParameters(
            DiFactory::class,
            ['di' => $this->di]
        );
    }
}
