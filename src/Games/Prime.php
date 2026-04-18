<?php

namespace BrainGames\Games\Prime;

use function cli\line;
use function cli\prompt;

use const BrainGames\Config\{GAME_PRIME_DESCRIPTION, QUESTION_FORMAT, USER_ANSWER};

const MIN_RANDOM_NUMBER = 0;
const MAX_RANDOM_NUMBER = 10;
const LOWEST_PRIME_NUMBER = 2;
const FIRST_ODD_DIVISOR = 3;
const DIVISOR_STEP = 2;
const EVEN_DIVIDER = 2;
const ZERO_REMAINDER = 0;

/**
 * @return array{string, string}
 */
function primeGame(): array
{
    $number = random_int(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);

    $correctAnswer = (isPrime($number)) ? 'yes' : 'no';

    line(GAME_PRIME_DESCRIPTION);
    line(QUESTION_FORMAT, $number);

    $userAnswer = prompt(USER_ANSWER);

    return [$userAnswer, $correctAnswer];
}

function isPrime(int $number): bool
{
    if ($number < LOWEST_PRIME_NUMBER) {
        return false;
    }

    if ($number === LOWEST_PRIME_NUMBER) {
        return true;
    }

    if ($number % EVEN_DIVIDER === ZERO_REMAINDER) {
        return false;
    }

    $maxDivisor = (int) sqrt($number);
    
    for ($i = FIRST_ODD_DIVISOR; $i <= $maxDivisor; $i += DIVISOR_STEP) {
        if ($number % $i === ZERO_REMAINDER) {
            return false;
        }
    }

    return true;
}
