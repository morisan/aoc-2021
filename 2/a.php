<?php
$input = file_get_contents('input.txt');
$lines = array_filter(explode(PHP_EOL, $input));

$x = 0;
$y = 0;
foreach ($lines as $command) {
    list($direction, $distance) = explode(' ', $command);

    if ($direction === 'forward') {
        $x += (int) $distance;
    } elseif ($direction === 'down') {
        $y += (int) $distance;
    } elseif ($direction === 'up') {
        $y -= (int) $distance;
    }
}

print $x*$y;
