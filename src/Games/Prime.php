<?php

namespace BrainGames\Games\Prime;

use function cli\line;
use function cli\prompt;

function primeGame(): array
{
    $number = random_int(0, 10);

    $correctAnswer = (isPrime($number)) ? 'yes' : 'no';

    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    line('Question: %s', $number);

    $userAnswer = prompt('Your answer');

    return [$userAnswer, $correctAnswer];
}

function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }

    $isPrime = true;

    if ($number !== 2 && $number % 2 === 0) {
        $isPrime = false;
    } else {
        for ($i = 3; $i <= sqrt($number); $i += 2) {
            if ($number % $i === 0) {
                $isPrime = false;
                break;
            }
        }
    }

    return $isPrime;
}
