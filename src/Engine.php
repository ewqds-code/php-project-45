<?php

namespace BrainGames\Engine;

use function cli\line;
use function BrainGames\Games\Even\evenGame;

const ATTEMPT_COUNT = 3;

function engine($name)
{
    for ($i = 0; $i < ATTEMPT_COUNT; $i++) {
    [$userAnswer, $correctAnswer] = evenGame();

    $result = checkAnswer($userAnswer, $correctAnswer, $name);
    
    if ($result) {
        continue;
        } else {
            return ;
        }
    }
}

function checkAnswer($userAnswer, $correctAnswer, $name)
{
    if ($userAnswer === $correctAnswer) {
        line('Correct!');
        return true;
    } else {
        line("%s is wrong answer ;(. Correct answer was %s. Let's try again, %s!", 
            $userAnswer, 
            $correctAnswer, 
            $name
        );
        return false;
    }
}