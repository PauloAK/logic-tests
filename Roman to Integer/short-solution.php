<?php

$testRomanNumerals = ['I', 'II', 'IV', 'VI', 'IX', 'X', 'XII', 'IL', 'DCCC', 'MCMXCVIII', 'MMXXI', 'MMMDCCXXIV'];
const ROMAN_CHAR_TO_INT = ['I' => 1, 'V' => 5, 'X' => 10, 'L' => 50, 'C' => 100, 'D' => 500, 'M' => 1000 ];

foreach ($testRomanNumerals as $roman) {
    $integer = castRomanToInt($roman);
    echo "{$roman} => {$integer}" . PHP_EOL;
}

/**
 * @param  string  $roman
 * @return integer
 */
function castRomanToInt($roman)
{
	if (!$roman) throw new Exception ("Invalid Roman Numeral");
    $chars = str_split(strtoupper($roman));
    $value = 0;
    for ($i = 0; $i < count($chars); $i++) {
    	$currentValue = ROMAN_CHAR_TO_INT[ $chars[$i] ] ?? 0;
    	$nextValue = $i < count($chars) - 1 ? ROMAN_CHAR_TO_INT[ $chars[$i + 1] ] : 0;

    	if (!$nextValue || $nextValue <= $currentValue) {
    		$value += $currentValue;
    	} else {
    		$value += $nextValue - $currentValue;
    		$i++;
    	}
    }
    return $value;
}
?>