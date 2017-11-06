<?php.

$s = '[2/{5*(4+7)}]';

$s1 = ['[','(','{'];
$s2 = [']',')','}'];

$skob=[];

for ($i=0;$i<strlen($s);$i++) {
  echo "{$s[$i]}? ";
  if (in_array($s[$i], $s1)) { // открывается - в стек
    echo " opened skob\n";
    $skob[] = $s[$i];
  } elseif (in_array($s[$i], $s2)) {
    echo " closed skob\n";
    if (!count($skob)) {
      echo "Wrong {$s[$i]} at position $i\n";die;
    }
    $lastSkob = array_pop($skob);
    $skobPos = array_search($lastSkob, $s1);
    $skobOpened = $s1[$skobPos];
    if ($lastSkob != $skobOpened) {
      echo "Wrong {$s[$i]} at {$i}, last opened must be {$skobOpened}, but found {$lastSkob}\n";die;
    }
  }
}

if (count($skob)) {
  echo "Something are not closed\n";die;
}

