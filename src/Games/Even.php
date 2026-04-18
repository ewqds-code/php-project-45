<?php

namespace BrainGames\Games\Even;

use function cli\line;
use function cli\prompt;

use const BrainGames\Config\{GAME_EVEN_DESCRIPTION, QUESTION_FORMAT, USER_ANSWER};

const MIN_RANDOM_NUMBER = 1;
const MAX_RANDOM_NUMBER = 99;

/**
 * @return array{string, string}
 */
function evenGame(): array
{
    $randomNumber = random_int(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);

    line(GAME_EVEN_DESCRIPTION);
    line(QUESTION_FORMAT, $randomNumber);

    $userAnswer = prompt(USER_ANSWER);
    $correctAnswer = isEven($randomNumber) ? 'yes' : 'no';

    return [$userAnswer, $correctAnswer];
}

function isEven(int $number): bool
{
    return ($number % 2) === 0;
}
