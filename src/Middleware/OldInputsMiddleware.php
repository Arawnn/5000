<?php

namespace The5000\Middleware;

class OldInputsMiddleware extends Middleware
{

    public function __invoke($request, $response, $next)
    {
        if( isset($_SESSION['old']) )
        {
            $this->container->twig->getEnvironment()->addGlobal('old', $_SESSION['old']);
            $_SESSION['old'] = $request->getParams();
        }

        $response = $next($request, $response);
        return $response;
    }
}