<?php

namespace BrainGames\Games;

use function BrainGames\runGame;

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function generateEvenData(): array
{
    $number = rand(1, 100);

    $question = "$number";
    $correctAnswer = isEven($number) ? 'yes' : 'no';

    return [$question, $correctAnswer];
}

function playEven(): void
{
    runGame('Answer "yes" if the number is even, otherwise answer "no".', fn() => generateEvenData());
}