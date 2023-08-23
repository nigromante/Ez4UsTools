<?php

namespace Ez4us\Tools\convert\Number2Letter;


class Number2LetterNonNumericException  extends \Exception
{
    private const MUST_BE_NUMERIC = 'Argument must me numeric';

    public static function Send()
    {
        return new self(self::MUST_BE_NUMERIC);
    }
}
