<?php
$input = file_get_contents('input.txt');
$lines = array_filter(explode(PHP_EOL, $input));

function getOxygenGeneratorRating($lines, $pos)
{
    $b0_lines = [];
    $b1_lines = [];
    foreach ($lines as $l) {
        if ($l[$pos] === '1') {
            $b1_lines[] = $l;
        } else{
            $b0_lines[] = $l;
        }
    }

    if (count($b1_lines) < count($b0_lines)) {
        $lines = $b0_lines;
    } else {
        $lines = $b1_lines;
    }

    if (count($lines) === 1) {
        return $lines[0];
    } else {
        return getOxygenGeneratorRating($lines, $pos+1);
    }
}

function getCo2ScrubberRating($lines, $pos)
{
    $b0_lines = [];
    $b1_lines = [];
    foreach ($lines as $l) {
        if ($l[$pos] === '1') {
            $b1_lines[] = $l;
        } else{
            $b0_lines[] = $l;
        }
    }

    if (count($b1_lines) < count($b0_lines)) {
        $lines = $b1_lines;
    } else {
        $lines = $b0_lines;
    }

    if (count($lines) === 1) {
        return $lines[0];
    } else {
        return getCo2ScrubberRating($lines, $pos+1);
    }
}

echo bindec(getOxygenGeneratorRating($lines, 0)) * bindec(getCo2ScrubberRating($lines, 0));
