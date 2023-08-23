<?php

namespace Ez4us\Tools\convert\Number2Letter;


final class Number2LetterES extends Number2Letter
{
    private static $CDU_WORDS = [
        'c'   => ['', 'ciento', 'doscientos', 'trescientos', 'cuatrocientos', 'quinientos', 'seiscientos', 'setecientos', 'ochocientos', 'novecientos'],
        'd'   => ['', '', 'veinte', 'trienta', 'cuarenta', 'cincuenta', 'sesenta', 'setenta', 'ochenta', 'noventa'],
        'du'  => ['diez', 'once', 'doce', 'trece', 'catorce', 'quince', 'dieciseis', 'diecisiete', 'dieciocho', 'diecinueve'],
        'du2' => ['veinte', 'veintiun', 'veintidos', 'veintitres', 'veinticuatro', 'veinticinco', 'veintiseis', 'veintisiete', 'veintiocho', 'veintinueve'],
        'u'   => ['', 'uno', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho', 'nueve'],
    ];

    private static $CDU_LABELS = ['', 'mil', 'millon', 'mil', 'billon', 'mil', 'millon', 'mil'];


    public static function GetText($value)
    {
        parent::GetText($value);

        if ($value == 0)
            return "cero";

        $cduList =  self::groupsCDU($value);
        $cduLast = count($cduList) - 1;

        $response = '';
        foreach ($cduList as $cduCurrent => $cdu) {

            $cduText = self::section($cdu);
            if ($cduText != '') {
                $response .=  self::sectionLabel($cduText, $cduLast - $cduCurrent);
            }
        }

        return trim($response);
    }



    private static function section($cdu)
    {
        extract($cdu);
        $cduText = '';

        // CENTENAS
        if (isset($c)) {
            if ($c == 1 && ($d == 0 && $u == 0)) {
                $cduText .= 'cien';
            } else {
                $cduText .= self::$CDU_WORDS['c'][$c];
            }
            $cduText .= ' ';
        }

        // DECENAS
        if (isset($d) && $d != 0) {
            if ($d == 1) {
                $cduText .= self::$CDU_WORDS['du'][$u];
            } else
            if ($d == 2) {
                $cduText .= self::$CDU_WORDS['du2'][$u];
            } else {
                $cduText .= self::$CDU_WORDS['d'][$d];
            }
            $cduText .= ' ';
        }

        //  UNIDADES
        if (isset($u) && $u != 0) {
            if (isset($d)) {
                if ($d != 0 && ($d != 1 && $d != 2)) {
                    $cduText .= 'y ';
                }
                if ($d != 1 && $d != 2) {
                    $cduText .=  self::$CDU_WORDS['u'][$u];
                }
                $cduText .= ' ';
            } else {
                $cduText .= self::$CDU_WORDS['u'][$u];
                $cduText .= ' ';
            }
        }

        return trim($cduText);
    }


    private static function sectionLabel($cduText, $section)
    {
        $label = self::$CDU_LABELS[$section];

        if ($label == 'mil' && $cduText == 'uno')
            $cduText = '';

        if ($label == 'millon') {
            if ($cduText == 'uno') {
                $cduText = 'un';
            } else {
                $label = 'millones';
            }
        }

        if ($label == 'billon') {
            if ($cduText == 'uno') {
                $cduText = 'un';
            } else {
                $label = 'billones';
            }
        }

        $response = $cduText;

        if ($label != '')
            $response .= ' ' . $label . ' ';

        return $response;
    }
}
