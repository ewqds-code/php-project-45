<?php

namespace BrainGames\Games\GCD;

use function cli\line;
use function cli\prompt;

use const BrainGames\Config\{GAME_GCD_DESCRIPTION, QUESTION_TWO_VALUES_FORMAT, USER_ANSWER};

const MIN_RANDOM_NUMBER = -100;
const MAX_RANDOM_NUMBER = 100;

/**
 * @return array{string, string}
 */
function gcdGame(): array
{
    $number1 = random_int(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);
    $number2 = random_int(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);

    line(GAME_GCD_DESCRIPTION);
    line(QUESTION_TWO_VALUES_FORMAT, $number1, $number2);

    $userAnswer = prompt(USER_ANSWER);
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
