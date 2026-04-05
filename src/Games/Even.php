<?php

namespace BrainGames\Games\Even;

use function cli\line;
use function cli\prompt;

function evenGame()
{
    $randomNumber = mt_rand(1, 99);

    line('Answer "yes" if the number is even, otherwise answer "no".');
    line('Question: %s', $randomNumber);

    $userAnswer = prompt('Your answer: ');
    $correctAnswer = (isEven(($randomNumber))) ? "yes" : "no";

    return [$userAnswer, $correctAnswer];
}

function isEven($number): string
{
    return ($number % 2) === 0;
}
