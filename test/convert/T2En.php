<?php
system("clear");
require_once "../../vendor/autoload.php" ; 

use Ez4us\Tools\convert\Number2Letter\Number2LetterEN;


function test( $n ) {
    $response = Number2LetterEN::GetText( $n ) ;
    echo "\n\n $n :: " . $response . "\n\n" ;
}

$line = fgets(STDIN);
while( strtoupper(trim($line)) != "FIN") {
  test( (int) $line ) ;
  $line = fgets(STDIN);
}


