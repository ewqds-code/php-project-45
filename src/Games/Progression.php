<?php

namespace BrainGames\Games\Progression;

use function cli\line;
use function cli\prompt;

use const BrainGames\Config\{GAME_PROGRESSION_DESCRIPTION, QUESTION_FORMAT, USER_ANSWER};

const PROGRESSION_LENGTH = 10;
const MIN_START_VALUE = 0;
const MAX_START_VALUE = 10;
const MIN_STEP_VALUE = 1;
const MAX_STEP_VALUE = 10;

/**
 * @return array{string, string}
 */
function progressionGame(): array
{
    $start = random_int(MIN_START_VALUE, MAX_START_VALUE);
    $progressionStep = random_int(MIN_STEP_VALUE, MAX_STEP_VALUE);

    $progression = generateProgression($start, PROGRESSION_LENGTH, $progressionStep);
    [$questionStr, $correctAnswer] = prepareGameData($progression);

    line(GAME_PROGRESSION_DESCRIPTION);
    line(QUESTION_FORMAT, $questionStr);

    $userAnswer = prompt(USER_ANSWER);

    return [$userAnswer, $correctAnswer];
}

function generateProgression(int $start, int $length, int $step): array
{
    $progression = [];

    for ($i = 0; $i < $length; $i += 1) {
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
