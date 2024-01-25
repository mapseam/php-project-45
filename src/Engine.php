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
 * @param array $cbArr  Array of call-back functions
*/
function gamePlay(array &$cbArr): void
{
    call_user_func($cbArr["welcomeCB"]);
    readUserName($cbArr["userNamePromptCB"], $cbArr["setUserNameCB"], $cbArr["helloCB"]);
    call_user_func($cbArr["tipCB"]);

    $userName = call_user_func($cbArr["getUserNameCB"]);

    for ($i = 1; $i <= 3; $i++) {
        call_user_func($cbArr["userAskPromptCB"], call_user_func($cbArr["toStringCB"]));
        $userAnswer = prompt(call_user_func($cbArr["userAnswerPromptCB"]));

        $correctAnswer = call_user_func($cbArr["calcResultCB"]);

        // answer is right
        if ($correctAnswer === $userAnswer) {
            call_user_func($cbArr["goodAnswerCB"]);
        } else {
            // answer is wrong or undefined
            exit(call_user_func($cbArr["badAnswerCB"], $userAnswer, $correctAnswer, $userName));
        }
    }

    call_user_func($cbArr["congratCB"], $userName);
}
