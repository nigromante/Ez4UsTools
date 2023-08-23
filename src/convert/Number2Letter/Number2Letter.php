<?php
namespace Ez4us\Tools\convert\Number2Letter;

abstract class Number2Letter implements Number2LetterInterface {


    public static function length( $value ) {
        return 1 + (int)log10( $value ) ; 
    }


    public static function fillCDU( $arr ) {
        $keys = [ 'u', 'd', 'c' ];
        $response = [] ;
        foreach( $arr as $k => $v ) {
            $response[ $keys[$k] ] = $v ; 
        }
        return $response ; 
    }

    public static function groupsCDU( $value ) {
        $response = [] ; 
        $digitos = str_split( ""  . $value );

        $x=[];
        while( count( $digitos) > 0 ) {
            $t =array_pop( $digitos )  ;
            $x[]= (int)$t  ;
            if( count($x) == 3 ) {
                $response[] = self::fillCDU( $x ); 
                $x=[];
            } 
        }
        if( count( $x ) > 0 ) {
            $response[] =self::fillCDU( $x ) ; 
        }

        return array_reverse($response) ; 
    }


    public static function execute( $value ) {

        self::EnsuranceInteger( $value ) ; 

        return '';
    }


    private static function EnsuranceInteger( $value ) {

        if( is_null($value) )
            throw Number2LetterNullArgException::Send();

        if( is_string($value))  
            return throw Number2LetterNonNumericException::Send();


        if( !is_numeric($value))  
            return throw Number2LetterNonNumericException::Send();
    }

}

