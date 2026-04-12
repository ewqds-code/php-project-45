<?php

namespace BrainGames\Engine;

use function cli\line;
use function BrainGames\Cli\run as runGreetings;

const ATTEMPT_COUNT = 3;

function runGame($gameName)
{
    $name = runGreetings();
    $gameFunction = selectGame($gameName);

    for ($i = 0; $i < ATTEMPT_COUNT; $i++) {
        [$userAnswer, $correctAnswer] = call_user_func($gameFunction);
        if (!checkAnswer($userAnswer, $correctAnswer, $name)) {
            return;
        }
    }

    line('Congratulations, %s!', $name);
}

function selectGame($gameName)
{
    switch ($gameName) {
        case 'even':
            $gameFunction = '\BrainGames\Games\Even\evenGame';
            break;
        case 'calc':
            $gameFunction = '\BrainGames\Games\Calc\calcGame';
            break;
        case 'gcd':
            $gameFunction = '\BrainGames\Games\GCD\gcdGame';
            break;
        case 'progression':
            $gameFunction = 'BrainGames\Games\Progression\progressionGame';
            break;
        case 'prime':
            $gameFunction = 'BrainGames\Games\Prime\primeGame';
            break;
        default:
            echo "\nНеизвестное название игры\n";
            break;
    }

    return $gameFunction;
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
