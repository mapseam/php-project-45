<?php

/**
 * BrainGames GCD controller unit
 *
 * @author    Oleg Kartashov <mapseam@yandex.ru>
 * @copyright 2024 Oleg Kartashov (https://github.com/mapseam/)
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 */

namespace Brain\Games\GcdC;

use Brain\Games\CommonModel;
use Brain\Games\GcdM;
use Brain\Games\CommonView;
use Brain\Games\GcdV;
use Brain\Engine;

/**
 * A routine for direct call from bin file
*/
function gameRun(): void
{
    $welcomeCB = 'Brain\Games\CommonView\printWelcome';
    $userNamePromptCB = 'Brain\Games\CommonView\getUserNamePrompt';
    $setUserNameCB = 'Brain\Games\CommonModel\setUserName';
    $helloCB = 'Brain\Games\CommonView\printHello';
    $getUserNameCB = 'Brain\Games\CommonModel\getUserName';
    $tipCB = 'Brain\Games\GcdV\printTip';
    $userAskPromptCB = 'Brain\Games\CommonView\printUserAskPrompt';
    $toStringCB = 'Brain\Games\GcdM\toString';
    $userAnswerPromptCB = 'Brain\Games\CommonView\getUserAnswerPrompt';
    $calcResultCB = 'Brain\Games\GcdM\calcResult';
    $goodAnswerCB = 'Brain\Games\CommonView\printForGoodAnswer';
    $badAnswerCB = 'Brain\Games\CommonView\printForBadAnswer';
    $congratCB = 'Brain\Games\CommonView\printCongrat';

    Engine\gamePlay(
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
    );
}
