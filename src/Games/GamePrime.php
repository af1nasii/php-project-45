<?php

namespace BrainGames\Games\GamePrime;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;
const MIN_NUMBER = 1;
const MAX_NUMBER = 100;

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

function playPrime(): void
{
    line('Welcome to the Brain Games!');
    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);

    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $question = rand(MIN_NUMBER, MAX_NUMBER);
        $correctAnswer = isPrime($question) ? 'yes' : 'no';

        line("Question: %d", $question);
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

