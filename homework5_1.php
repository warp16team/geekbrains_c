<?php

$a = 5;

while ($a > 1) {
  $ost[] = ($a % 2);
  $a = floor($a/2);
}
$ost[] = $a;

while (count($ost)) {
  $o = array_pop($ost);
  echo "$o";
}


echo "\n";
