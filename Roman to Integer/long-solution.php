<?php
$testRomanNumerals = [
    'I',
    'II',
    'IV',
    'VI',
    'IX',
    'X',
    'XII',
    'IL',
    'DCCC',
    'MCMXCVIII',
    'MMXXI',
    'MMMDCCXXIV'
];

foreach ($testRomanNumerals as $roman) {
    $integer = castRomanToInt($roman);
    echo "{$roman} => {$integer}" . PHP_EOL;
}

/**
 * @param string $roman
 * @return int
 * @throws Exception
**/
function castRomanToInt($roman)
{
    if (!$roman) {
        throw new Exception ("Invalid Roman Numeral");
    }
    $chars = str_split(strtoupper($roman));
    $value = 0;
    $currentCharIndex = 0;
    
    do {
        $currentCharValue = romanCharToInt( $chars[ $currentCharIndex ] );
        
        $nextCharValue = null;
        if ( $currentCharIndex < count($chars) - 1)
            $nextCharValue = romanCharToInt($chars[$currentCharIndex + 1]);
        
        if ( is_null($nextCharValue) || $nextCharValue <= $currentCharValue ) {
            $value += $currentCharValue;
            $currentCharIndex++;
            continue;
        }
        
        $value += $nextCharValue - $currentCharValue;
        $currentCharIndex += 2;
    } while ( $currentCharIndex < count($chars) );
    
    return $value;
}

/**
 * @param string $roman
 * @return int
 * @throws Exception
**/
function romanCharToInt($roman) {
    switch ($roman) {
        case 'I':
            return 1;
        case 'V':
            return 5;
        case 'X':
            return 10;
        case 'L':
            return 50;
        case 'C':
            return 100;
        case 'D':
            return 500;
        case 'M':
            return 1000;
        default:
            throw new Exception ("Invalid Roman Algarism");
            break;
    }
}
?>