<?php

namespace BrainGames\Games\GCD;

use function cli\line;
use function cli\prompt;

function gcdGame()
{
    $number1 = mt_rand(-100, 100);
    $number2 = mt_rand(-100, 100);

    line('Find the greatest common divisor of given numbers.');
    line('Question: %s %s', $number1, $number2);

    (string) $userAnswer = prompt('Your answer');
    $correctAnswer = gcd($number1, $number2);

    return [$userAnswer, $correctAnswer];
}

function gcd(int $num1, int $num2): string
{
    if ($num2 == 0) {
        return (string) abs($num1);
    }

    if ($num1 == 0) {
        return (string) abs($num2);
    }

    $num1 = abs($num1);
    $num2 = abs($num2);
    $gcd = $num1;
    while ($num2 !== 0) {
        [$num1, $num2] = [$num2, $num1 % $num2];
        $gcd = $num1;
    }

    return (string) $gcd;
}
