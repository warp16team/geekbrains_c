<?php

// Подсчет сколько максимум можно занять клеток конем, если он не будет наступать дважды на те же клетки


$field = [];

// 0--7

$mx = 7;
$my = 7;

for ($y=0;$y<=$my;$y++) {
  for ($x=0;$x<=$mx;$x++) {
    $field[$x][$y] = 0;
  }
}

$debug = 100;

forward($field, $mx, $my, 0, 0, ($mx+1) * ($my+1));

for ($y=0;$y<=$my;$y++) {
  for ($x=0;$x<=$mx;$x++) {
    echo "{$field[$x][$y]} ";
  }
  echo "\n";
}


function forward(&$field, $mx, $my, $x, $y, $remains) {
  global $debug;

  if ($x < 0 || $x > $mx || $y < 0 || $y > $my) {
    return false;
  }
//echo "--$x $y $remains\n";

  if ($field[$x][$y] > 0) {
    return false;
  }

  $remains--;

  $field[$x][$y] = $remains;

  if ($remains == 0) {
    return true;
  }

  if (
      forward($field, $mx, $my, $x-1, $y-2, $remains)
      || forward($field, $mx, $my, $x-2, $y-1, $remains)
      || forward($field, $mx, $my, $x+1, $y-2, $remains)
      || forward($field, $mx, $my, $x+2, $y-1, $remains)
      || forward($field, $mx, $my, $x-1, $y+2, $remains)
      || forward($field, $mx, $my, $x-2, $y+1, $remains)
      || forward($field, $mx, $my, $x+1, $y+2, $remains)
      || forward($field, $mx, $my, $x+2, $y+1, $remains)
  ) return true;

  $field[$x][$y] = 0;

//echo '[No]';

if ($remains < $debug) { // ---

$debug = $remains; echo $remains . " \n";

for ($y=0;$y<=$my;$y++) {
  for ($x=0;$x<=$mx;$x++) {
    echo "{$field[$x][$y]} ";
  }
  echo "\n";
}

} //---

  return false;
}

