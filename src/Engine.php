<?php

namespace BrainGames\Engine;

use function cli\line;
use function BrainGames\Cli\run as runGreetings;
use function BrainGames\Games\Calc\calcGame;
use function BrainGames\Games\Even\evenGame;
use function BrainGames\Games\GCD\gcdGame;
use function BrainGames\Games\Prime\primeGame;
use function BrainGames\Games\Progression\progressionGame;

const ATTEMPT_COUNT = 3;

function runGame(string $gameName): void
{
    $name = runGreetings();

    for ($i = 0; $i < ATTEMPT_COUNT; $i++) {
        [$userAnswer, $correctAnswer] = selectGame($gameName);
        if (!checkAnswer($userAnswer, $correctAnswer, $name)) {
            return;
        }
    }

    line('Congratulations, %s!', $name);
}

/**
 * @return array{0: string, 1: string}
 */
function selectGame(string $gameName): array
{
    return match ($gameName) {
        'even' => evenGame(),
        'calc' => calcGame(),
        'gcd' => gcdGame(),
        'progression' => progressionGame(),
        'prime' => primeGame(),
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
