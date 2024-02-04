<?php

/**
 * BrainEven game
 *
 * @author    Oleg Kartashov <mapseam@yandex.ru>
 * @copyright 2024 Oleg Kartashov (https://github.com/mapseam/)
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 */

namespace Brain\Games\Even;

use Brain\Games\CommonModel;
use Brain\Games\CommonView;
use Brain\Engine;

use function cli\line;

$GLOBALS['randomNumber'] = null;


/**
 * A routine for direct call from bin file
*/
function gameRun(): void
{
    $callBacksArray = array(
        "welcomeCB" => 'Brain\Games\CommonView\printWelcome',
        "userNamePromptCB" => 'Brain\Games\CommonView\getUserNamePrompt',
        "setUserNameCB" => 'Brain\Games\CommonModel\setUserName',
        "helloCB" => 'Brain\Games\CommonView\printHello',
        "getUserNameCB" => 'Brain\Games\CommonModel\getUserName',
        "tipCB" => 'Brain\Games\Even\printTip',
        "userAskPromptCB" => 'Brain\Games\CommonView\printUserAskPrompt',
        "toStringCB" => 'Brain\Games\Even\toString',
        "userAnswerPromptCB" => 'Brain\Games\CommonView\getUserAnswerPrompt',
        "calcResultCB" => 'Brain\Games\Even\calcResult',
        "goodAnswerCB" => 'Brain\Games\CommonView\printForGoodAnswer',
        "badAnswerCB" => 'Brain\Games\CommonView\printForBadAnswer',
        "congratCB" => 'Brain\Games\CommonView\printCongrat'
    );

    Engine\gamePlay($callBacksArray);
}


/**
 * Init source data
 */
function initData(): void
{
    $GLOBALS['randomNumber'] = random_int(1, 100);
}


/**
 * Return string presentation of calculated expression
 *
 *$return string        String presentation of calculated expression
*/
function calcResult(): string
{
    $operationResult = ($GLOBALS['randomNumber'] % 2 === 0);

    return $operationResult ? "yes" : "no";
}


/**
 * Init source data and return string presentation of source expression
 *
 * @return string        String presentation of source expression
*/
function toString(): string
{
    initData();
    $stringExpression = "{$GLOBALS['randomNumber']}";

    return $stringExpression;
}


/**
 *  Prints the tip message to `STDOUT` with a newline appended.
 *
*/
function printTip(): void
{
    line('Answer "yes" if the number is even, otherwise answer "no".');
}
