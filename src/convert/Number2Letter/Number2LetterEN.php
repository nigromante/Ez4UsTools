<?php

namespace Ez4us\Tools\convert\Number2Letter;


final class Number2LetterEN extends Number2Letter
{
    private static $CDU_WORDS = [
        'c'   => ['', 'one hundred', 'two hundred', 'three hundred', 'four hundred', 'five hundred', 'six hundred', 'seven hundred', 'eight hundred', 'nine hundred'],
        'd'   => ['', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'],
        'du'  => ['ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'],
        'u'   => ['', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'],
    ];

    private static $CDU_LABELS = ['', 'thousand', 'million',  'billion', 'trillion', 'quadrillion' , 'quintillion'];


    public static function GetText($value)
    {
        parent::GetText($value);

        if ($value == 0)
            return "zero";

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

    private static function centenas($cdu) {
        extract($cdu);
        if (isset($c) && $c != 0) {
            return self::$CDU_WORDS['c'][$c] . ' ' ;
        }
        return '';
    }

    private static function decenas($cdu) {
        extract($cdu);
        if (isset($d) && $d != 0) {
            if ($d == 1) {
                return self::$CDU_WORDS['du'][$u] . ' ' ;
            } 
            return self::$CDU_WORDS['d'][$d] ;
        }
        return '';
    }

    private static function unidades($cdu) {
        extract($cdu);
        if (isset($u) && $u != 0) {
            if (isset($d) && $d !=0) {
                if( $d == 1)
                    return '';
                return '-' . self::$CDU_WORDS['u'][$u] . ' ';
            }
            return self::$CDU_WORDS['u'][$u] . ' ' ;
        }
        return '';
    }

    private static function section($cdu)
    {

        return trim( 
                self::centenas( $cdu ) .
                self::decenas($cdu) .
                self::unidades($cdu) 
            ) ;

    }
   


    private static function sectionLabel($cduText, $section)
    {
        $label = self::$CDU_LABELS[$section];


        $response = $cduText;

        if ($label != '')
            $response .= ' ' . $label . ' ';

        return $response;
    }
}
