<?php

namespace BrainGames\Engine;

use function cli\line;
use function BrainGames\Cli\run as runGreetings;

const ATTEMPT_COUNT = 3;

function runGame(string $gameName): void
{
    $name = runGreetings();
    $gameFunction = selectGame($gameName);

    for ($i = 0; $i < ATTEMPT_COUNT; $i++) {
        [$userAnswer, $correctAnswer] = $gameFunction();
        if (!checkAnswer($userAnswer, $correctAnswer, $name)) {
            return;
        }
    }

    line('Congratulations, %s!', $name);
}

/**
 * @return callable(): array{0: string, 1: string}
 */
function selectGame(string $gameName): callable
{
    return match ($gameName) {
        'even' => '\BrainGames\Games\Even\evenGame',
        'calc' => '\BrainGames\Games\Calc\calcGame',
        'gcd' => '\BrainGames\Games\GCD\gcdGame',
        'progression' => '\BrainGames\Games\Progression\progressionGame',
        'prime' => '\BrainGames\Games\Prime\primeGame',
        default => throw new \InvalidArgumentException("Unknown game: {$gameName}"),
    };
}

function checkAnswer(string $userAnswer, string $correctAnswer, string $name): bool
{
    if ($userAnswer === $correctAnswer) {
        line('Correct!');
        return true;
    } else {
        line(
            "%s is wrong answer ;(. Correct answer was %s. Let's try again, %s!",
            $userAnswer,
            $correctAnswer,
            $name
        );
        return false;
    }
}
