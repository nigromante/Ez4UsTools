<?php

namespace Ez4us\Tools\convert\Number2Letter\lib;

use Ez4us\Tools\convert\Number2Letter\lib\Number2LetterNonNumericException;
use Ez4us\Tools\convert\Number2Letter\lib\Number2LetterNullArgException;

trait Number2Letter
{

    public static function GetText($value)
    {
        self::EnsuranceInteger($value);

        if ($value == 0) {
            return self::zero();
        }

        $cduList =  self::groupsCDU($value);
        $cduLast = count($cduList) - 1;

        $response = '';
        foreach ($cduList as $cduCurrent => $cdu) {

            $cduText = self::section($cdu);
            if ($cduText != '') {
                $response .=  self::label($cduText, $cduLast - $cduCurrent);
            }
        }
        return trim($response);
    }


    private static function fillCDU($arr)
    {
        $keys = ['u', 'd', 'c'];
        $response = [];
        foreach ($arr as $k => $v) {
            $response[$keys[$k]] = $v;
        }
        return $response;
    }

    protected static function groupsCDU($value)
    {
        $response = [];
        $digitos = str_split(""  . $value);

        $x = [];
        while (count($digitos) > 0) {
            $t = array_pop($digitos);
            $x[] = (int)$t;
            if (count($x) == 3) {
                $response[] = self::fillCDU($x);
                $x = [];
            }
        }
        if (count($x) > 0) {
            $response[] = self::fillCDU($x);
        }

        return array_reverse($response);
    }



    protected static function section($cdu)
    {
        return trim(
            self::centenas($cdu) .
                self::decenas($cdu) .
                self::unidades($cdu)
        );
    }

    private static function EnsuranceInteger($value)
    {

        if (is_null($value))
            throw Number2LetterNullArgException::Send();

        if (is_string($value))
            return throw Number2LetterNonNumericException::Send();


        if (!is_numeric($value))
            return throw Number2LetterNonNumericException::Send();
    }
}
