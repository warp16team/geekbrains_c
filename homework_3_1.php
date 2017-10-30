<?php

$a = [12,457,32,78,34,78,3,56,23,22,23,21,65,23,87,34,3636,23,56];


function sortBubble($a) {

$indexMax = count($a)-1;

for ($n = 0; $n <= ceil($indexMax / 2); $n++) { // сколько итераций надо сделать не знаю, половину? четко половину или нет, не знаю
  echo "[[$n]] ";
  for ($index = 0; $index < $indexMax; $index++) { // в одну сторону
    if ($a[$index] > $a[$index+1]) {
      $tmp=$a[$index];$a[$index]=$a[$index+1];$a[$index+1]=$tmp; // меняем местами
    }
  }
//  printar($a);
  for ($index = $indexMax; $index > 0; $index--) { // в другую сторону
    if ($a[$index] < $a[$index-1]) {
      $tmp=$a[$index];$a[$index]=$a[$index-1];$a[$index-1]=$tmp; // меняем местами
    }
  }
//  printar($a);
}


  return $a;
}

function printar($a) {
  foreach ($a as $v) {
    echo "$v ";
  }
  echo "\n";
}


var_dump(sortBubble($a));
