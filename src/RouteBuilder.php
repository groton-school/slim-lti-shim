<?php

declare(strict_types=1);

namespace GrotonSchool\Slim\LTI;

use GrotonSchool\Slim\LTI\Actions\JWKSAction;
use GrotonSchool\Slim\LTI\Actions\LaunchAction;
use GrotonSchool\Slim\LTI\Actions\LoginAction;
use GrotonSchool\Slim\LTI\Actions\RegistrationStartAction;
use GrotonSchool\Slim\LTI\Middleware\CookieMiddleware;
use GrotonSchool\Slim\Norms\RouteBuilderInterface;
use Psr\Http\Server\MiddlewareInterface;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface;
use Slim\Interfaces\RouteGroupInterface;

class RouteBuilder implements RouteBuilderInterface
{
    public function define(App $app, ?MiddlewareInterface ...$innerMiddleware): RouteGroupInterface
    {
        $group = $app->group('/lti', function (RouteCollectorProxyInterface $lti) {
            $lti->post('/launch', LaunchAction::class);
            $lti->get('/jwks', JWKSAction::class);
            $lti->get('/register', RegistrationStartAction::class);
            $lti->post('/login', LoginAction::class);
        });

        foreach ($innerMiddleware as $middleware) {
            $group = $group->add($middleware);
        }

        return $group->add(CookieMiddleware::class);
    }
}
