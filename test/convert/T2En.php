<?php
require_once "../../vendor/autoload.php" ; 

use Ez4us\Tools\convert\Number2Letter\Number2LetterEN;


function clrscr() {
  system("clear");
}


function say( $text ) {
  echo  $text . "\n" ;
  system("espeak  -s80 '". $text ."' & ") ;
}


function convert_number( $n ) {
  $response = Number2LetterEN::GetText( $n ) ;
  say($response) ;
} 


function work_loop() {
  $line = fgets(STDIN);
  while( strtoupper(trim($line)) != "END") {
    convert_number( (int) $line ) ;
    $line = fgets(STDIN);
  }
}


clrscr();
work_loop();


