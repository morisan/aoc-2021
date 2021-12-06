<?php

$input = file_get_contents('input.txt');
$lines = array_filter(explode(PHP_EOL, $input));

$x = 0;
$y = 0;
$aim = 0;
foreach ($lines as $command) {
    list($direction, $distance) = explode(' ', $command);

    if ($direction === 'forward') {
        $x += (int) $distance;
        $y += (int) $distance * $aim;
    } elseif ($direction === 'down') {
        $aim += (int) $distance;
    } elseif ($direction === 'up') {
        $aim -= (int) $distance;
    }
}

print $x*$y;
