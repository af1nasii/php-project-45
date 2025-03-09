<?php

namespace BrainGames;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function runGame(string $gameDescription, callable $generateRoundData): void
{
    line('Welcome to the Brain Games!');
    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);

    line($gameDescription);

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        [$question, $correctAnswer] = $generateRoundData();
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
