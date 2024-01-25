<?php

/**
 * BrainGames engine unit
 *
 * @author    Oleg Kartashov <mapseam@yandex.ru>
 * @copyright 2024 Oleg Kartashov (https://github.com/mapseam/)
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 */

namespace Brain\Engine;

use function cli\prompt;

/**
 * Displays a request to enter the game's user name.
 *
 * @param callable $userNamePromptCB    Prompt user name
 * @param callable $setUserNameCB   Save user name
 * @param callable $helloCB     Print hello message
*/
function readUserName($userNamePromptCB, $setUserNameCB, $helloCB): void
{
    $userName = prompt(question: call_user_func($userNamePromptCB), marker: '');
    call_user_func($setUserNameCB, $userName);
    call_user_func($helloCB, $userName);
}


/**
 * A routine for direct call from controller unit
 *
 * @param callable $welcomeCB       Print welcome message
 * @param callable $userNamePromptCB    Prompt user name
 * @param callable $setUserNameCB   Save user name
 * @param callable $helloCB     Print hello message
 * @param callable $getUserNameCB   Return user name
 * @param callable $tipCB       Print tip message
 * @param callable $userAskPromptCB Prompt user's question
 * @param callable $toStringCB      Print presentation view of user's question
 * @param callable $userAnswerPromptCB  Prompt user's answer
 * @param callable $calcResultCB    Print presentation view of user's answer
 * @param callable $goodAnswerCB    Print decision for right user's answer
 * @param callable $badAnswerCB     Print decision for wrong user's answer
 * @param callable $congratCB       Print congratulation message
*/
function gamePlay(
    $welcomeCB,
    $userNamePromptCB,
    $setUserNameCB,
    $helloCB,
    $getUserNameCB,
    $tipCB,
    $userAskPromptCB,
    $toStringCB,
    $userAnswerPromptCB,
    $calcResultCB,
    $goodAnswerCB,
    $badAnswerCB,
    $congratCB
): void {
    call_user_func($welcomeCB);
    readUserName($userNamePromptCB, $setUserNameCB, $helloCB);
    call_user_func($tipCB);

    $userName = call_user_func($getUserNameCB);

    for ($i = 1; $i <= 3; $i++) {
        call_user_func($userAskPromptCB, call_user_func($toStringCB));
        $userAnswer = prompt(call_user_func($userAnswerPromptCB));

        $correctAnswer = call_user_func($calcResultCB);

        // answer is right
        if ($correctAnswer === $userAnswer) {
            call_user_func($goodAnswerCB);
        } else {
            // answer is wrong or undefined
            exit(call_user_func($badAnswerCB, $userAnswer, $correctAnswer, $userName));
        }
    }

    call_user_func($congratCB, $userName);
}
