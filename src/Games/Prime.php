<?php

namespace BrainGames\Games\Prime;

use function cli\line;
use function cli\prompt;

function primeGame(): array
{
    $number = mt_rand(0, 10);

    $correctAnswer = (isPrime($number)) ? 'yes' : 'no';

    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    line('Question: %s', $number);

    $userAnswer = (string) prompt('Your answer');

    return [$userAnswer, $correctAnswer];
}

function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }

    if ($number === 2) {
        return true;
    }

    if ($number % 2 === 0) {
        return false;
    }

    for ($i = 3; $i <= sqrt($number); $i += 2) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}
