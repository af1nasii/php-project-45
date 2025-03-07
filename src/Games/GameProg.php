<?php

namespace BrainGames\Games\GameProg;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;
const MIN_LENGTH = 5;
const MAX_LENGTH = 10;
const MIN_START = 1;
const MAX_START = 50;
const MIN_STEP = 1;
const MAX_STEP = 10;

function generateProgression(int $start, int $step, int $length): array
{
    $progression = [];
    for ($i = 0; $i < $length; $i++) {
        $progression[] = $start + $i * $step;
    }
    return $progression;
}

function playProgression(): void
{
    line('Welcome to the Brain Games!');
    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);

    line('What number is missing in the progression?');

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $length = rand(MIN_LENGTH, MAX_LENGTH);
        $start = rand(MIN_START, MAX_START);
        $step = rand(MIN_STEP, MAX_STEP);
        $progression = generateProgression($start, $step, $length);

        $hiddenIndex = rand(0, $length - 1);
        $correctAnswer = (string) $progression[$hiddenIndex];
        $progression[$hiddenIndex] = '..';

        $question = implode(' ', $progression);
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
