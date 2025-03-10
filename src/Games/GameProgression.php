<?php

namespace BrainGames\Games;

use function BrainGames\runGame;

function generateProgression(int $start, int $step, int $length): array
{
    $progression = [];
    for ($i = 0; $i < $length; $i++) {
        $progression[] = $start + $i * $step;
    }
    return $progression;
}

function generateProgData(): array
{
    $length = rand(5, 10);
    $start = rand(1, 50);
    $step = rand(1, 10);
    $progression = generateProgression($start, $step, $length);

    $hiddenIndex = rand(0, $length - 1);
    $correctAnswer = (string) $progression[$hiddenIndex];
    $progression[$hiddenIndex] = '..';

    $question = implode(' ', $progression);

    return [$question, $correctAnswer];
}

function playProgression(): void
{
    runGame('What number is missing in the progression?', fn() => generateProgData());
}
