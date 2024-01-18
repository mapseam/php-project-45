<?php

namespace BrainGames\Even\V;

use function cli\line;

function printWelcome(): void
{
    line('Welcome to the Brain Games!');
}

function getUserNamePrompt(): string
{
    $userNamePrompt = 'May I have your name? ';
    return $userNamePrompt;
}

function printHello(string $userName): void
{
    line("Hello, %s!", $userName);
}

function printTip(): void
{
    line('Answer "yes" if the number is even, otherwise answer "no".');
}

function printForBadAnswer(string $userName, string $wrongAnswer, string $correctAnswer): void
{
    line("'%s' is wrong answer ;(. Correct answer was '%s'.", $wrongAnswer, $correctAnswer);
    line("Let's try again, %s!", $userName);
}

function printForGoodAnswer(): void
{
    line("Correct!");
}

function printCongrat(string $userName): void
{
    line("Congratulations, %s!", $userName);
}

function printUserAskPrompt(int $randomInt): void
{
    line("Question: %d", $randomInt);
}

function getUserAnswerPrompt(): string
{
    $userAnswerPrompt = 'Your answer';
    return $userAnswerPrompt;
}
