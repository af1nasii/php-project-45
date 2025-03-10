<?php

namespace BrainGames\Games;

use function BrainGames\runGame;

const OPERATORS = ['+', '-', '*'];

function calculate(int $a, int $b, string $operator): int
{
    switch ($operator) {
        case '+':
            return $a + $b;
        case '-':
            return $a - $b;
        case '*':
            return $a * $b;
        default:
            throw new \Exception("Unknown operator: $operator");
    }
}

function generateCalcData(): array
{
    $a = rand(1, 20);
    $b = rand(1, 20);
    $operator = OPERATORS[array_rand(OPERATORS)];

    $question = "$a $operator $b";
    $correctAnswer = (string) calculate($a, $b, $operator);

    return [$question, $correctAnswer];
}

function playCalc(): void
{
    runGame('What is the result of the expression?', fn() => generateCalcData());
}
