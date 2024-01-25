<?php

/**
 * BrainEven game Controller unit
 *
 * @author    Oleg Kartashov <mapseam@yandex.ru>
 * @copyright 2024 Oleg Kartashov (https://github.com/mapseam/)
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 */

namespace BrainGames\Even\C;

use BrainGames\Even\V;
use BrainGames\Even\M;

use function cli\prompt;

define("RIGHT_ANSWER", "yes");
define("WRONG_ANSWER", "no");

/**
 * A utility for direct calling from CLI
*/
function gameRun(): void
{
    V\printWelcome();
    readUserName();
    V\printTip();

    for ($i = 1; $i <= 3; $i++) {
        $randomInt = M\getRandomInt();

        V\printUserAskPrompt($randomInt);
        $userAnswer = prompt(V\getUserAnswerPrompt());

        $isEven = M\isEvenNumbered($randomInt);
        if (($isEven && $userAnswer === RIGHT_ANSWER) || (!$isEven && $userAnswer === WRONG_ANSWER)) {
            V\printForGoodAnswer();
        } else {
            $userName = M\getUserName();

            if ($userAnswer === RIGHT_ANSWER) {
                V\printForBadAnswer($userName, $userAnswer, WRONG_ANSWER);
            } elseif ($userAnswer === WRONG_ANSWER) {
                V\printForBadAnswer($userName, $userAnswer, RIGHT_ANSWER);
            } else {
                // undefined answer
                V\printForBadAnswer($userName, $userAnswer, $isEven ? RIGHT_ANSWER : ANSWER_NO);
            }
            exit;
        }
    }

    V\printCongrat(M\getUserName());
}

/**
 * Displays a request to enter the game's user name.
*/
function readUserName(): void
{
    $userName = prompt(question: V\getUserNamePrompt(), marker: '');
    M\setUserName($userName);
    V\printHello(M\getUserName());
}
