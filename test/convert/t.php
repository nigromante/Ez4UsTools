<?php
system("clear");
require_once "../../vendor/autoload.php" ; 


use Ez4us\Tools\convert\Number2Letter\Number2LetterEs;

function test( $n ) {
    $response = Number2LetterEs::GetText( $n ) ;
    echo "\n\n $n :: " . $response ;
}

test( 0) ; 
test( 1 ) ; 
test( 7 ) ;
test( 10 ) ; 
test( 11 ) ; 
test( 13 ) ;
test( 20 ) ; 
test( 21 ) ; 
test( 31 ) ; 
test( 100 ) ; 
test( 101 ) ; 
test( 201 ) ; 
test( 216 ) ; 
test( 221 ) ; 
test( 1000 ) ; 
test( 1318 ) ; 
test( 1221 ) ; 
test( 3825 ) ; 
test( 10000 ) ; 
test( 10001 ) ; 
test( 312901 ) ;
test( 1000000 ) ;
test( 1000001 ) ;
test( 15000001 ) ;
test( 415000001 ) ;
test( 7415000001 ) ;
test( 37415000001 ) ;
test( 437415000001 ) ;
test( 987654321987 ) ;
test( 8437415000001 ) ;
echo "\n\n";



    

