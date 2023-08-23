<?php
require_once "../../vendor/autoload.php" ; 

use PHPUnit\Framework\TestCase;

use Ez4us\Tools\convert\Number2Letter\Number2LetterEs;
use Ez4us\Tools\convert\Number2Letter\Number2LetterNullArgException;
use Ez4us\Tools\convert\Number2Letter\Number2LetterNonNumericException;

final class Number2LetterTest extends TestCase
{

    
    public function testLength1()
    {

        $this->assertEquals( 1, Number2LetterEs::length( 1 ) ) ;
    }
    public function testLength2()
    {

        $this->assertEquals( 2, Number2LetterEs::length( 11 ) ) ;
    }
    public function testLength4()
    {

        $this->assertEquals( 4, Number2LetterEs::length( 4321 ) ) ;
    }

    public function testNullParameter()
    {

        $this->expectException( Number2LetterNullArgException::class);


        $response = Number2LetterEs::execute( null ) ; 

    }

    public function testNonNumericParameter()
    {
        $this->expectException( Number2LetterNonNumericException::class );

        $response = Number2LetterEs::execute( "hola" ) ; 
    }

    public function test0()
    {
        $response = Number2LetterEs::execute( 0 ) ;
        $this->assertEquals( "cero" , $response) ; 
    }


    public function test4321()
    {
        $response = Number2LetterEs::execute( 4321 ) ;
        $this->assertEquals( "cuatro mil trescientos veintiun" , $response) ; 
    }



    public function test1()
    {
        $response = Number2LetterEs::execute( 1 ) ;
        $this->assertEquals( "uno" , $response) ; 
    }
    
    public function test7()
    {
        $response = Number2LetterEs::execute( 7 ) ;
        $this->assertEquals( "siete" , $response) ; 
    }

    public function test10()
    {
        $response = Number2LetterEs::execute( 10 ) ;
        $this->assertEquals( "diez" , $response) ; 
    }

    public function test13()
    {
        $response = Number2LetterEs::execute( 13 ) ;
        $this->assertEquals( "trece" , $response) ; 
    }

    public function test20()
    {
        $response = Number2LetterEs::execute( 20 ) ;
        $this->assertEquals( "veinte" , $response) ; 
    }

    public function test22()
    {
        $response = Number2LetterEs::execute( 22 ) ;
        $this->assertEquals( "veintidos" , $response) ; 
    }

    public function test50()
    {
        $response = Number2LetterEs::execute( 50 ) ;
        $this->assertEquals( "cincuenta" , $response) ; 
    }
    public function test57()
    {
        $response = Number2LetterEs::execute( 57 ) ;
        $this->assertEquals( "cincuenta y siete" , $response) ; 
    }

    public function test100()
    {
        $response = Number2LetterEs::execute( 100 ) ;
        $this->assertEquals( "cien" , $response) ; 
    }

    public function test101()
    {
        $response = Number2LetterEs::execute( 101 ) ;
        $this->assertEquals( "ciento uno" , $response) ; 
    }

    public function test200()
    {
        $response = Number2LetterEs::execute( 200 ) ;
        $this->assertEquals( "doscientos" , $response) ; 
    }

    public function test212()
    {
        $response = Number2LetterEs::execute( 212 ) ;
        $this->assertEquals( "doscientos doce" , $response) ; 
    }

    public function test1000()
    {
        $response = Number2LetterEs::execute( 1000 ) ;
        $this->assertEquals( "mil" , $response) ; 
    }

    public function test1318()
    {
        $response = Number2LetterEs::execute( 1318 ) ;
        $this->assertEquals( "mil trescientos dieciocho" , $response) ; 
    }
    public function test3826()
    {
        $response = Number2LetterEs::execute( 3826 ) ;
        $this->assertEquals( "tres mil ochocientos veintiseis" , $response) ; 
    }

    public function test10000()
    {
        $response = Number2LetterEs::execute( 10000 ) ;
        $this->assertEquals( "diez mil" , $response) ; 
    }

    public function test10001()
    {
        $response = Number2LetterEs::execute( 10001 ) ;
        $this->assertEquals( "diez mil uno" , $response) ; 
    }
    public function test312901()
    {
        $response = Number2LetterEs::execute( 312901 ) ;
        $this->assertEquals( "trescientos doce mil novecientos uno" , $response) ; 
    }
    public function test1000000()
    {
        $response = Number2LetterEs::execute( 1000000 ) ;
        $this->assertEquals( "un millon" , $response) ; 
    }
    public function test1000001()
    {
        $response = Number2LetterEs::execute( 1000001 ) ;
        $this->assertEquals( "un millon uno" , $response) ; 
    }
    public function test15000001()
    {
        $response = Number2LetterEs::execute( 15000001 ) ;
        $this->assertEquals( "quince millones uno" , $response) ; 
    }
    public function test415000001()
    {
        $response = Number2LetterEs::execute( 415000001 ) ;
        $this->assertEquals( "cuatrocientos quince millones uno" , $response) ; 
    }
    public function test7415000001()
    {
        $response = Number2LetterEs::execute( 7415000001 ) ;
        $this->assertEquals( "siete mil cuatrocientos quince millones uno" , $response) ; 
    }

}

