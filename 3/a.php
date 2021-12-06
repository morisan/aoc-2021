<?php
$input = file_get_contents('input.txt');
$lines = array_filter(explode(PHP_EOL, $input));

$total_lines = 0;
$b1_totals = [];
foreach ($lines as $l) {
    $bits_arr = str_split($l);
    foreach ($bits_arr as $i => $bit) {
        // Init
        if (!isset($b1_totals[$i])) {
            $b1_totals[$i] = 0;
        }

        if ($bit === '1') {
            $b1_totals[$i]++;
        }
    }

    $total_lines++;
}
$mid = $total_lines / 2;

$gamma = '';
$epsilon = '';
foreach ($b1_totals as $b1_total) {
    if ($b1_total > $mid) {
        $gamma .= '1';
        $epsilon .= '0';
    } else {
        $gamma .= '0';
        $epsilon .= '1';
    }
}

echo bindec($gamma) * bindec($epsilon);