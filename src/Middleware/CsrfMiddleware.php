<?php

namespace The5000\Middleware;

class CsrfMiddleware extends Middleware
{

    public function __invoke($request, $response, $next)
    {

        $this->container->twig->getEnvironment()->addGlobal('csrf', [
            'field' => '
                <input  type="hidden" 
                        name="' . $this->container->csrf->getTokenNameKey() . '" 
                        value="' . $this->container->csrf->getTokenName() . '"
                >
                <input  type="hidden" 
                        name="' . $this->container->csrf->getTokenValueKey() . '" 
                        value="' . $this->container->csrf->getTokenValue() . '"
                >

            '
        ]);
        $response = $next($request, $response);
        return $response;
    }
}