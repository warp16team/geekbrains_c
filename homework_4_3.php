<?php

// попытка поставить n коней, не бьющих друг друга
// попытался изобрести алгоритм, не учел что надо узнавать куда в итоге они встали,
// а также отрицательные индексы... ну и не учел что первого коня можно ставить не только на клетку (0,0)
// программу следует переписать вообще по-другому

$field = [];

// 0--7

$mx = 7;
$my = 7;

$n = 4;

for ($y=0;$y<=$my;$y++) {
  for ($x=0;$x<=$mx;$x++) {
    $field[$x][$y] = 0;
  }
}

forward($field, $mx, $my, 0, 0, $n);

for ($y=0;$y<=$my;$y++) {
  for ($x=0;$x<=$mx;$x++) {
    echo "{$field[$x][$y]} ";
  }
  echo "\n";
}


function forward(&$field, $mx, $my, $x, $y, $remains) {
  echo "--$x $y $remains\n";
  if ($remains == 0) {
    return true;
  }

  if ($field[$x][$y] > 0) {
    return false;
  }

  $field[$x][$y]++;

  $field[$x-1][$y-2]++;
  $field[$x-2][$y-1]++;
  $field[$x+1][$y-2]++;
  $field[$x+2][$y-1]++;
  $field[$x-1][$y+2]++;
  $field[$x-2][$y+1]++;
  $field[$x+1][$y+2]++;
  $field[$x+2][$y+1]++;

  for ($i=0;$i<=$mx;$i++) {
    for($j=0;$j<=$my;$j++) {
      if (forward($field, $mx, $my, $i, $j, $remains - 1)) {
        return true;
      }
    }
  }

  $field[$x][$y]--;

  $field[$x-1][$y-2]--;
  $field[$x-2][$y-1]--;
  $field[$x+1][$y-2]--;
  $field[$x+2][$y-1]--;
  $field[$x-1][$y+2]--;
  $field[$x-2][$y+1]--;
  $field[$x+1][$y+2]--;
  $field[$x+2][$y+1]--;

  return false;
}
