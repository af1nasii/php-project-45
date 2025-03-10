<?php

namespace BrainGames\Games;

use function BrainGames\runGame;

function gcd(int $a, int $b): int
{
    while ($b !== 0) {
        [$a, $b] = [$b, $a % $b];
    }
    return $a;
}

function generateGcdData(): array
{
    $a = rand(1, 100);
    $b = rand(1, 100);

    $question = "$a $b";
    $correctAnswer = (string) gcd($a, $b);

    return [$question, $correctAnswer];
}

function playGcd(): void
{
    runGame('Find the greatest common divisor of given numbers.', fn() => generateGcdData());
}
