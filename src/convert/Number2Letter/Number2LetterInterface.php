<?php

namespace Ez4us\Tools\convert\Number2Letter;

interface Number2LetterInterface
{

    public static function GetText($value);

    public static function centenas($cdu);

    public static function decenas($cdu);

    public static function unidades($cdu);

    public static function Label($cduText, $section);
}
