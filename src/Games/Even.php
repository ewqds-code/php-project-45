<?php

namespace BrainGames\Games\Even;

use function cli\line;
use function cli\prompt;

const MIN_RANDOM_NUMBER = 1;
const MAX_RANDOM_NUMBER = 99;
const EVEN_DIVIDER = 2;
const ZERO_REMAINDER = 0;

/**
 * @return array{string, string}
 */
function evenGame(): array
{
    $randomNumber = random_int(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);

    line('Answer "yes" if the number is even, otherwise answer "no".');
    line('Question: %s', $randomNumber);

    $userAnswer = prompt('Your answer');
    $correctAnswer = isEven($randomNumber) ? 'yes' : 'no';

    return [$userAnswer, $correctAnswer];
}

function isEven(int $number): bool
{
    return ($number % EVEN_DIVIDER) === ZERO_REMAINDER;
}
