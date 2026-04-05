<?php

namespace BrainGames\Games\Calc;

use function cli\line;
use function cli\prompt;

function calcGame()
{
    $number1 = mt_rand(1, 9);
    $number2 = mt_rand(1, 9);
    $operation = selectOperation();

    $expression = "{$number1} {$operation} {$number2}";
    line('What is the result of the expression?');
    line('Question: %s', $expression);

    $userAnswer = prompt('Your answer');
    $correctAnswer = calculateExpression($number1, $number2, $operation);

    return [$userAnswer, $correctAnswer];
}

function selectOperation()
{
    $operations = ['+', '-', '*'];
    return $operations[array_rand($operations)];
}

function calculateExpression(int $number1, int $number2, string $operation): string
{
    $result = 0;

    switch ($operation) {
        case '+':
            $result = $number1 + $number2;
            break;
        case '-':
            $result = $number1 - $number2;
            break;
        case '*':
            $result = $number1 * $number2;
            break;
        default:
            echo "Неизвестная операция";
            break;
    }

    return (string) $result;
}
