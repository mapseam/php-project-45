<?php

/**
 * BrainGames common view unit
 *
 * @author    Oleg Kartashov <mapseam@yandex.ru>
 * @copyright 2024 Oleg Kartashov (https://github.com/mapseam/)
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 */

namespace Brain\Games\CommonView;

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
 * Prints the hello message to `STDOUT` with a newline appended for game's user name.
 *
 * @param string  $userName  The game's user name
*/
function printHello(string $userName): void
{
    line("Hello, %s!", $userName);
}


/**
 *  Prints the message to `STDOUT` with a newline appended when a bad response is received.
 *
 * $param string  $userAnswer      The user answer for the question asked.
 * $param string  $correctAnswer   The correct answer for the question asked.
 * $param string  $userName        The game's user name.
*/
function printForBadAnswer(string $userAnswer, string $correctAnswer, string $userName): void
{
    line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
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
function printUserAskPrompt(string $questionValue): void
{
    line("Question: %s", $questionValue);
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
