<?php
require_once "../../vendor/autoload.php";

use PHPUnit\Framework\TestCase;

use Ez4us\Tools\convert\Number2Letter\lib\Number2LetterNonNumericException;
use Ez4us\Tools\convert\Number2Letter\lib\Number2LetterNullArgException;

use Ez4us\Tools\convert\Number2Letter\Number2LetterEN;


final class Number2LetterENTest extends TestCase
{

    public function testNullParameter()
    {

        $this->expectException(Number2LetterNullArgException::class);


        $response = Number2LetterEN::GetText(null);
    }

    public function testNonNumericParameter()
    {
        $this->expectException(Number2LetterNonNumericException::class);

        $response = Number2LetterEN::GetText("hola");
    }

    public function test0()
    {
        $response = Number2LetterEN::GetText(0);
        $this->assertEquals("zero", $response);
    }


    public function test4321()
    {
        $response = Number2LetterEN::GetText(4321);
        $this->assertEquals("four thousand three hundred twenty-one", $response);
    }



    public function test1()
    {
        $response = Number2LetterEN::GetText(1);
        $this->assertEquals("one", $response);
    }

    public function test7()
    {
        $response = Number2LetterEN::GetText(7);
        $this->assertEquals("seven", $response);
    }

    public function test10()
    {
        $response = Number2LetterEN::GetText(10);
        $this->assertEquals("ten", $response);
    }

    public function test13()
    {
        $response = Number2LetterEN::GetText(13);
        $this->assertEquals("thirteen", $response);
    }

    public function test20()
    {
        $response = Number2LetterEN::GetText(20);
        $this->assertEquals("twenty", $response);
    }

    public function test22()
    {
        $response = Number2LetterEN::GetText(22);
        $this->assertEquals("twenty-two", $response);
    }

    public function test50()
    {
        $response = Number2LetterEN::GetText(50);
        $this->assertEquals("fifty", $response);
    }
    public function test57()
    {
        $response = Number2LetterEN::GetText(57);
        $this->assertEquals("fifty-seven", $response);
    }

    public function test100()
    {
        $response = Number2LetterEN::GetText(100);
        $this->assertEquals("one hundred", $response);
    }

    public function test101()
    {
        $response = Number2LetterEN::GetText(101);
        $this->assertEquals("one hundred one", $response);
    }

    public function test200()
    {
        $response = Number2LetterEN::GetText(200);
        $this->assertEquals("two hundred", $response);
    }

    public function test212()
    {
        $response = Number2LetterEN::GetText(212);
        $this->assertEquals("two hundred twelve", $response);
    }

    public function test1000()
    {
        $response = Number2LetterEN::GetText(1000);
        $this->assertEquals("one thousand", $response);
    }

    public function test1318()
    {
        $response = Number2LetterEN::GetText(1318);
        $this->assertEquals("one thousand three hundred eighteen", $response);
    }
    public function test3826()
    {
        $response = Number2LetterEN::GetText(3826);
        $this->assertEquals("three thousand eight hundred twenty-six", $response);
    }

    public function test10000()
    {
        $response = Number2LetterEN::GetText(10000);
        $this->assertEquals("ten thousand", $response);
    }

    public function test10001()
    {
        $response = Number2LetterEN::GetText(10001);
        $this->assertEquals("ten thousand one", $response);
    }
    public function test312901()
    {
        $response = Number2LetterEN::GetText(312901);
        $this->assertEquals("three hundred twelve thousand nine hundred one", $response);
    }
    public function test1000000()
    {
        $response = Number2LetterEN::GetText(1000000);
        $this->assertEquals("one million", $response);
    }
    public function test1000001()
    {
        $response = Number2LetterEN::GetText(1000001);
        $this->assertEquals("one million one", $response);
    }
    public function test15000001()
    {
        $response = Number2LetterEN::GetText(15000001);
        $this->assertEquals("fifteen million one", $response);
    }
    public function test415000001()
    {
        $response = Number2LetterEN::GetText(415000001);
        $this->assertEquals("four hundred fifteen million one", $response);
    }
    public function test7415000001()
    {
        $response = Number2LetterEN::GetText(7415000001);
        $this->assertEquals("seven billion four hundred fifteen million one", $response);
    }
}
