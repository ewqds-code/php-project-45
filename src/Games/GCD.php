<?php

namespace BrainGames\Games\GCD;

use function cli\line;
use function cli\prompt;

function gcdGame(): array
{
    $number1 = random_int(-100, 100);
    $number2 = random_int(-100, 100);

    line('Find the greatest common divisor of given numbers.');
    line('Question: %s %s', $number1, $number2);

    $userAnswer = prompt('Your answer');
    $correctAnswer = findGcd($number1, $number2);

    return [$userAnswer, $correctAnswer];
}

function findGcd(int $num1, int $num2): string
{
    if ($num2 === 0) {
        return (string) abs($num1);
    }

    if ($num1 === 0) {
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
