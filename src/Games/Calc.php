<?php

namespace BrainGames\Games\Calc;

use function cli\line;
use function cli\prompt;

const MIN_OPERAND_VALUE = 1;
const MAX_OPERAND_VALUE = 9;
const OPERATOR_ADD = '+';
const OPERATOR_SUBTRACT = '-';
const OPERATOR_MULTIPLY = '*';

/**
 * @return array{string, string}
 */
function calcGame(): array
{
    $number1 = random_int(MIN_OPERAND_VALUE, MAX_OPERAND_VALUE);
    $number2 = random_int(MIN_OPERAND_VALUE, MAX_OPERAND_VALUE);
    $operation = selectOperation();

    $expression = "{$number1} {$operation} {$number2}";
    line('What is the result of the expression?');
    line('Question: %s', $expression);

    $userAnswer = prompt('Your answer');
    $correctAnswer = calculateExpression($number1, $number2, $operation);

    return [$userAnswer, $correctAnswer];
}

function selectOperation(): string
{
    $operations = [OPERATOR_ADD, OPERATOR_SUBTRACT, OPERATOR_MULTIPLY];
    return $operations[array_rand($operations)];
}

function calculateExpression(int $number1, int $number2, string $operation): string
{
    return match ($operation) {
        OPERATOR_ADD => (string) ($number1 + $number2),
        OPERATOR_SUBTRACT => (string) ($number1 - $number2),
        OPERATOR_MULTIPLY => (string) ($number1 * $number2),
        default => throw new \InvalidArgumentException("Unknown operation: {$operation}"),
    };
}
