<?php

namespace BrainGames\Games\GameCalc;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;
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

function playCalc(): void
{
    line('Welcome to the Brain Games!');
    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);

    line('What is the result of the expression?');

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $a = rand(1, 50);
        $b = rand(1, 50);
        $operator = OPERATORS[array_rand(OPERATORS)];

        $question = "$a $operator $b";
        $correctAnswer = (string) calculate($a, $b, $operator);

        line("Question: %s", $question);
        $userAnswer = prompt("Your answer");

        if ($userAnswer !== $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
            line("Let's try again, %s!", $userName);
            return;
        }

        line("Correct!");
    }

    line("Congratulations, %s!", $userName);
}