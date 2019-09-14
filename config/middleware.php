<?php

use Respect\Validation\Validator as v;

$app->add(new \The5000\Middleware\ValidationErrorsMiddleware($container));
$app->add(new \The5000\Middleware\OldInputsMiddleware($container));

v::with('The5000\Validation\\Rules\\');