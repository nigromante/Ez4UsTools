<?php

namespace Ez4us\Tools\convert\Number2Letter;


final class Number2LetterEs extends Number2Letter
{
    private static $words = [
        'c'   => ['', 'ciento', 'doscientos', 'trescientos', 'cuatrocientos', 'quinientos', 'seiscientos', 'setecientos', 'ochocientos', 'novecientos'],
        'd'   => ['', '', 'veinte', 'trienta', 'cuarenta', 'cincuenta', 'sesenta', 'setenta', 'ochenta', 'noventa'],
        'du'  => ['diez', 'once', 'doce', 'trece', 'catorce', 'quince', 'dieciseis', 'diecisiete', 'dieciocho', 'diecinueve'],
        'du2' => ['veinte', 'veintiun', 'veintidos', 'veintitres', 'veinticuatro', 'veinticinco', 'veintiseis', 'veintisiete', 'veintiocho', 'veintinueve'],
        'u'   => ['', 'uno', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho', 'nueve'],
    ];

    private static $groups = ['', 'mil', 'millon', 'mil', 'billon', 'mil', 'millon', 'mil'];


    public static function execute($value)
    {

        parent::execute($value);


        if ($value == 0)
            return "cero";


        $grupos =  self::groupsDCU($value);

        $nGrupos = count($grupos) - 1;

        $textoFinal = '';
        foreach ($grupos as $key => $grupo) {

            $texto = self::section($grupo);
            if ($texto != '') {

                $textoFinal .=  self::sectionLabel($texto, $nGrupos - $key);
            }
        }

        return trim($textoFinal);
    }



    private static function section($grupo)
    {
        $texto = '';

        // CENTENAS
        if (isset($grupo['c'])) {
            if ($grupo['c'] == 1 && ($grupo['d'] == 0 && $grupo['u'] == 0)) {
                $texto .= 'cien';
            } else {
                $texto .= self::$words['c'][$grupo['c']];
            }
            $texto .= ' ';
        }

        // DECENAS
        if (isset($grupo['d']) && $grupo['d'] != 0) {
            if ($grupo['d'] == 1) {
                $texto .= self::$words['du'][$grupo['u']];
            } else
            if ($grupo['d'] == 2) {
                $texto .= self::$words['du2'][$grupo['u']];
            } else {
                $texto .= self::$words['d'][$grupo['d']];
            }
            $texto .= ' ';
        }

        //  UNIDADES
        if (isset($grupo['u']) && $grupo['u'] != 0) {
            if (isset($grupo['d'])) {
                if ($grupo['d'] != 0 && ($grupo['d'] != 1 && $grupo['d'] != 2)) {
                    $texto .= 'y ';
                }
                if ($grupo['d'] != 1 && $grupo['d'] != 2) {
                    $texto .=  self::$words['u'][$grupo['u']];
                }
                $texto .= ' ';
            } else {
                $texto .= self::$words['u'][$grupo['u']];
                $texto .= ' ';
            }
        }

        return trim($texto);
    }


    private static function sectionLabel($texto, $grupo)
    {
        $textoGrupo = self::$groups[$grupo];
        if ($textoGrupo == 'mil' && $texto == 'uno')
            $texto = '';

        if ($textoGrupo == 'millon') {
            if ($texto == 'uno') {
                $texto = 'un';
            } else {
                $textoGrupo = 'millones';
            }
        }
        if ($textoGrupo == 'billon') {
            if ($texto == 'uno') {
                $texto = 'un';
            } else {
                $textoGrupo = 'billones';
            }
        }
        $textoFinal = $texto;

        if ($textoGrupo != '')
            $textoFinal .= ' ' . $textoGrupo . ' ';

        return $textoFinal;
    }
}
