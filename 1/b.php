<?php

$input = file_get_contents('input.txt');
$lines = array_filter(explode(PHP_EOL, $input));

$window_counts = [];
$prev1 = null;
$prev2 = null;
foreach ($lines as $curr) {
    $curr = (int) $curr;

    if (!is_null($prev1) && !is_null($prev2)) {
        $window_counts[] = $prev2 + $prev1 + $curr;
    }

    $prev2 = $prev1;
    $prev1 = $curr;
}

$prev = null;
$count = 0;
foreach ($window_counts as $curr) {
    $curr = (int) $curr;

    if (!is_null($prev) && ($curr > $prev)) {
        $count++;
    }

    $prev = $curr;
}

print $count;
