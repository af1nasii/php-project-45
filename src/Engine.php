<?php

namespace BrainGames;

use function cli\line;
use function cli\prompt;

function runGame(string $gameDescription, callable $generateData): void
{
    $rounds = 3;
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line($gameDescription);

    for ($i = 0; $i < $rounds; $i++) {
        [$question, $correctAnswer] = $generateData();
        line("Question: %s", $question);
        $userAnswer = prompt("Your answer");

        if ($userAnswer !== $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return;
        }

        line("Correct!");
    }

    line("Congratulations, %s!", $name);
}
