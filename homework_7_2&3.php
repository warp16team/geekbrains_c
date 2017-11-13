<?php

// Обход в глубину
// не совсем понял как делать, вспомнил про матрицу смежности из урока, но не уверен что надо работать с ней..

//       A  B  C  D  E  F
$m[0] = [0, 3, 5, 0, 0, 0]; // A
$m[1] = [3, 0, 0, 0, 8, 0]; // B
$m[2] = [5, 0, 0, 4, 0, 0]; // C
$m[3] = [0, 0, 4, 0, 9, 4]; // D
$m[4] = [0, 8, 0, 9, 0, 0]; // E
$m[5] = [0, 0, 0, 4, 0, 0]; // F

$start = 2;

$mask = ['A', 'B', 'C', 'D', 'E', 'F'];

ob($m, $start, 5);

function ob(&$m, $start, $cnt) {
    global $mask;
    for ($i=0; $i<=$cnt; $i++) { // смотрим все смежные по порядку
        if ($m[$start][$i]>0) { // нашли смежный
            $m[$start][$i] = -1; // помечаем
            $m[$i][$start] = -1; // помечаем зеркало
            echo "{$mask[$start]}->{$mask[$i]} "; // производим переход из -> в
            ob($m, $i, $cnt);
        }
    }
}


// output: C->A A->B B->E E->D D->C D->F

echo "\n\n\n";

// обход в ширину - алгоритм из методички

//                0    1      2     3     4    5
//                A    B      C     D     E    F
$marks =       [  1,   1,     1,    1,    1,   1 ]; // 1 = вершина не достигнута волной
$connections = [[1,2],[0,4],[0,4],[2,5],[2,3],[3]];


$cnt=5;
$marks[2] = 2; // стартовый элемент, 2=находится во фронте волны
printMarks($marks);

do {
    $hasUnmarked = false;
    for ($current=0;$current<=$cnt; $current++) {
        if ($marks[$current]!=3) $hasUnmarked=true; // для условия конца цикла

        if ($marks[$current]==2) { // 2=находится во фронте волны
            echo "{$mask[$current]}: ";
            foreach ($connections[$current] as $connection) {
                echo "{$mask[$current]}->{$mask[$connection]} "; // производим переход из -> в
                if ($marks[$connection]==1) $marks[$connection] = 2; // 2=находится во фронте волны
            }
            $marks[$current] = 3;  // 3=ушла из волны
        }
    }

    printMarks($marks);
} while ($hasUnmarked); // пока не все = 3 (сделал так вместо цикла проверок что все равны 3)

function printMarks($marks) {
    echo "\n";
    foreach ($marks as $mark) {
        echo "$mark";
    }
    echo "\n";
}


/* output:

112111
C: C->A C->E E: E->C E->D
213231
A: A->B A->C B: B->A B->E D: D->C D->F F: F->D
333333

333333

 */

