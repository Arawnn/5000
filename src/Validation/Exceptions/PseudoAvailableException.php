<?php

namespace The5000\Validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class PseudoAvailableException extends ValidationException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'pseudo is already taken',
        ],
    ];
}