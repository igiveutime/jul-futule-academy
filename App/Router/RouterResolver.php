<?php

namespace App\Router;

use App\Di\DiFactory;
use App\Exceptions\PageNotFoundException;
use App\Models\SessionModel;

class RouterResolver
{
    public const MAIN_ROUTER_KEY = 'main';

    protected $urlPath;
    protected $routes;
    protected $routerMap;
    protected $sessionModel;

    protected $diFactory;

    public function __construct(DiFactory $diFactory, SessionModel $sessionModel, array $routerMap)
    {
        $this->diFactory = $diFactory;
        $this->sessionModel = $sessionModel;
        $this->routerMap = $routerMap;
    }


    public function execute(): void
    {
        $this->sessionModel->start();

        $controller = $this->diFactory->getInstance($this->routes[$this->urlPath]);
        $controller->execute();
    }

    public function setRoutes(string $url)
    {
        try {
            $this->urlPath = $this->getPathInfo($url);

            foreach ($this->routerMap as $router) {
                $currentRoutes = $router::getRoutes();

                if ($this->canHandle($this->urlPath, $currentRoutes)) {
                    $this->routes = $currentRoutes;
                    return;
                }
            }

            $this->diFactory->getInstance(PageNotFoundException::class);
        } catch (PageNotFoundException $e) {
        }
    }


    private function canHandle(string $urlPath, array $routes): bool
    {
        return array_key_exists($urlPath, $routes);
    }

    private function getPathInfo(string $url): ?string
    {
        $url = explode('?', $url)[0];

        return ($url[-1] === '/') ?
            substr($url, 0, -1) :
            $url;
    }
}
