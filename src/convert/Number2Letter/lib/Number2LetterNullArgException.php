<?php

namespace Ez4us\Tools\convert\Number2Letter\lib;


class  Number2LetterNullArgException extends \Exception
{
    private const NULL_ARG = 'User blocked';

    public static function Send()
    {
        return new self(self::NULL_ARG);
    }
}
