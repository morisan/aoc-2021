<?php
$input = file_get_contents('input.txt');
$lines = array_filter(explode(PHP_EOL, $input));

$prev = null;
$count = 0;
foreach ($lines as $curr) {
    $curr = (int) $curr;

    if (!is_null($prev) && ($curr > $prev)) {
        $count++;
    }

    $prev = $curr;
}

print $count;
