<?php

namespace BrainGames\Games\Progression;

use function cli\line;
use function cli\prompt;

const PROGRESSION_LENGTH = 10;
const MIN_START_VALUE = 0;
const MAX_START_VALUE = 10;
const MIN_STEP_VALUE = 1;
const MAX_STEP_VALUE = 10;
const START_INDEX = 0;
const INDEX_STEP = 1;

/**
 * @return array{string, string}
 */
function progressionGame(): array
{
    $start = random_int(MIN_START_VALUE, MAX_START_VALUE);
    $progressionStep = random_int(MIN_STEP_VALUE, MAX_STEP_VALUE);

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

    for ($i = START_INDEX; $i < $length; $i += INDEX_STEP) {
        $progression[$i] = $start + $i * $step;
    }

    return $progression;
}

/**
 * @return array{string, string}
 */
function prepareGameData(array $progression): array
{
    $missedIndex = array_rand($progression);
    $missedValue = (string) $progression[$missedIndex];
    $progression[$missedIndex] = '..';

    $questionStr = implode(' ', $progression);

    return [$questionStr, $missedValue];
}
