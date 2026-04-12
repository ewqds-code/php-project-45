<?php

namespace BrainGames\Games\Progression;

use function cli\line;
use function cli\prompt;

const PROGRESSION_LENGTH = 10;

function progressionGame(): array
{
    $start = random_int(0, 10);
    $progressionStep = random_int(1, 10);

    $progression = generateProgression($start, PROGRESSION_LENGTH, $progressionStep);
    [$questionStr, $correctAnswer] = prepareGameData($progression);

    line('What number is missing in the progression?');
    line('Question: %s', $questionStr);

    $userAnswer = prompt('Your answer');

    return [$userAnswer, $correctAnswer];
}

function generateProgression(int $start, int $length, int $step): array
{
    $progression = [];

    for ($i = 0; $i < $length; $i++) {
        $progression[$i] = $start + $i * $step;
    }

    return $progression;
}

function prepareGameData(array $progression): array
{
    $missedIndex = array_rand($progression);
    $missedValue = (string) $progression[$missedIndex];
    $progression[$missedIndex] = '..';

    $questionStr = implode(' ', $progression);

    return [$questionStr, $missedValue];
}
