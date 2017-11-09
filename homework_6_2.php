
<?php
// php 5.5.9

// делаю обход LRU
// главная проблема была составить дерево. не удается принять на выходе от addLeft addRight получать ссылку

//   10
// 8    16
//6 9  15  19
//        17  20
//              21

//       value, left, right, up
$root = [10, null, null, null];
addLeft(8, $root);
$el8 = & $root[1];
addLeft(6, $el8);
addRight(9, $el8);
addRight(16, $root);
$el16 = & $root[2];
addLeft(15, $el16);
addRight(19, $el16);
$el19 = & $el16[1];
addLeft(17, $el19);
addRight(20, $el19);
$el20 = & $el19[2];
addRight(21, $el20);

function addLeft($value, & $el) {
  $a = [$value, null, null, &$el];
  $el[1] = &$a;
}

function addRight($value, & $el) {
  $a = [$value, null, null, &$el];
  $el[2] = &$a;
}

function obhodLRU($el) {
  echo "_{$el[0]}_";
  if (!is_null($el[1])) { echo "..L.."; obhodLRU($el[1]); }
  if (!is_null($el[2])) { echo "..R.."; obhodLRU($el[2]); }
}

obhodLRU($root);

#var_dump($root);
