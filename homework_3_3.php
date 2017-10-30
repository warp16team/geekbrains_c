<?php

$a = [1,2,3,4,5,6,7];

function binSearch($a, $value) {

$indexMin = 0;
$indexMax = count($a)-1;

while ($indexMin <= $indexMax) {

// 0123456   0 + 5-0 / 2 -> 5/2 = 2
//.
  $indexMid = floor($indexMin + ($indexMax - $indexMin) / 2);
  echo "[$indexMin .. $indexMax] -> $indexMid ({$a[$indexMid]})\n";
..
  if ($a[$indexMid] == $value) {
    return $indexMid;
  }

  if ($value < $a[$indexMid]) {
     $indexMax = $indexMid-1;
  } else {
     $indexMin = $indexMid+1;
  }

//@$n++; if ($n>4)die;
}

  return -1;
}

var_dump(binSearch($a, 5));

