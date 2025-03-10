<?php

namespace BrainGames\Games;

use function BrainGames\runGame;

function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}

function generatePrimeData(): array
{
    $question = rand(1, 100);
    $correctAnswer = isPrime($question) ? 'yes' : 'no';

    return [$question, $correctAnswer];
}

function playPrime(): void
{
    runGame('Answer "yes" if given number is prime. Otherwise answer "no".', fn() => generatePrimeData());
}
