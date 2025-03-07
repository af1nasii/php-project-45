<?php

namespace BrainGames\Games\GameGcd;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function gcd(int $a, int $b): int
{
    while ($b !== 0) {
        [$a, $b] = [$b, $a % $b];
    }
    return $a;
}

function playGcd(): void
{
    line('Welcome to the Brain Games!');
    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);

    line('Find the greatest common divisor of given numbers.');

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $a = rand(1, 100);
        $b = rand(1, 100);

        $question = "$a $b";
        $correctAnswer = (string) gcd($a, $b);

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
