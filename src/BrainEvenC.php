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

/**
 * A utility for direct calling from CLI
*/
function gameRun(): void
{
    define("ANSWER_YES", "yes");
    define("ANSWER_NO", "no");

    V\printWelcome();
    readUserName();
    V\printTip();

    for ($i = 1; $i <= 3; $i++) {
        $randomInt = M\getRandomInt();

        V\printUserAskPrompt($randomInt);
        $userAnswer = prompt(V\getUserAnswerPrompt());

        $isEven = M\isEvenNumbered($randomInt);
        if (($isEven && $userAnswer === ANSWER_YES) || (!$isEven && $userAnswer === ANSWER_NO)) {
            V\printForGoodAnswer();
        } else {
            $userName = M\getUserName();

            if ($userAnswer === ANSWER_YES) {
                exit(V\printForBadAnswer($userName, $userAnswer, ANSWER_NO));
            } elseif ($userAnswer === ANSWER_NO) {
                exit(V\printForBadAnswer($userName, $userAnswer, ANSWER_YES));
            } else {
                // undefined answer
                exit(V\printForBadAnswer($userName, $userAnswer, $isEven ? ANSWER_YES : ANSWER_NO));
            }
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
