<?php

/**
 * BrainEven game View unit
 *
 * @author    Oleg Kartashov <mapseam@yandex.ru>
 * @copyright 2024 Oleg Kartashov (https://github.com/mapseam/)
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 */

namespace BrainGames\Even\V;

use function cli\line;

/**
 * Prints the welcome message to `STDOUT` with a newline appended.
*/
function printWelcome(): void
{
    line('Welcome to the Brain Games!');
}

/**
 * Return the game's user name prompt for ask
 *
 * @return string   The prompt for ask
*/
function getUserNamePrompt(): string
{
    $userNamePrompt = 'May I have your name? ';
    return $userNamePrompt;
}

/**
 *  Prints the hello message to `STDOUT` with a newline appended for game's user name.
 *
 * @param string  $userName  The game's user name
*/
function printHello(string $userName): void
{
    line("Hello, %s!", $userName);
}

/**
 *  Prints the tip message to `STDOUT` with a newline appended.
 *
*/
function printTip(): void
{
    line('Answer "yes" if the number is even, otherwise answer "no".');
}

/**
 *  Prints the message to `STDOUT` with a newline appended when a bad response is received.
 *
 * $param string  $userName     The game's user name.
 * $param string  $wrongAnswer      The wrong answer for the question asked.
 * $param string  $correctAnswer    The  good answer for the question asked.
*/
function printForBadAnswer(string $userName, string $wrongAnswer, string $correctAnswer): void
{
    line("'%s' is wrong answer ;(. Correct answer was '%s'.", $wrongAnswer, $correctAnswer);
    line("Let's try again, %s!", $userName);
}

/**
 *  Prints the message to `STDOUT` with a newline appended when a good response is received.
 *
*/
function printForGoodAnswer(): void
{
    line("Correct!");
}

/**
 *  Prints the congratulation message to `STDOUT` with a newline appended for game's user name.
 *
 * @param string  $userName  The game's user name
*/
function printCongrat(string $userName): void
{
    line("Congratulations, %s!", $userName);
}

/**
 *  Prints the prompt with a question to the game's user
 *
 * @param int  $randomInt  The even-numbered value
*/
function printUserAskPrompt(int $randomInt): void
{
    line("Question: %d", $randomInt);
}

/**
 * Return the game's user name prompt for answer
 *
 * @return string       The prompt for answer
*/
function getUserAnswerPrompt(): string
{
    $userAnswerPrompt = 'Your answer';
    return $userAnswerPrompt;
}
