<?php

namespace App\Router;

class Main extends RouterResolver
{
    public static function getRoutes(): array
    {
        return [
            null                                    => \App\Controller\HomeController::class,
            '/signin'                               => \App\Controller\Authentication\EditSignInController::class,
            '/login'                                => \App\Controller\Authentication\EditLogInController::class,
            '/logOut'                               => \App\Controller\Authentication\EditLogInController::class,
            '/user/signin'                          => \App\Controller\Authentication\SaveSignInController::class,
            '/user/login'                           => \App\Controller\Authentication\SaveLogInController::class,
            '/events'                               => \App\Controller\Events\ListController::class,
            '/events/event'                         => \App\Controller\Events\ViewController::class,
            '/courses/course'                       => \App\Controller\Courses\ViewController::class,
            '/courses/subscribe'                    => \App\Controller\Courses\SubscribeController::class,
            '/courses/unsubscribe'                  => \App\Controller\Courses\UnsubscribeController::class,
            '/courses'                              => \App\Controller\Courses\ListController::class,
        ];
    }
}
