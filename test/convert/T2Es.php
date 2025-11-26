<?php
system("clear");
require_once "../../vendor/autoload.php" ; 

use Ez4us\Tools\convert\Number2Letter\Number2LetterES;


function test( $n ) {
    $response = Number2LetterES::GetText( $n ) ;
    echo "\n\n $n :: " . $response . "\n\n" ;
}

$line = fgets(STDIN);
while( strtoupper(trim($line)) != "FIN") {
  test( (int) $line ) ;
  $line = fgets(STDIN);
}


