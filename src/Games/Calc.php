<?php

/**
 * BrainCalc game
 *
 * @author    Oleg Kartashov <mapseam@yandex.ru>
 * @copyright 2024 Oleg Kartashov (https://github.com/mapseam/)
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 */

namespace Brain\Games\Calc;

use Brain\Games\CommonModel;
use Brain\Games\CommonView;
use Brain\Engine;

use function cli\line;

$GLOBALS['randomNumberX'] = null;
$GLOBALS['randomNumberY'] = null;
$GLOBALS['operationSign'] = null;


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
        "tipCB" => 'Brain\Games\Calc\printTip',
        "userAskPromptCB" => 'Brain\Games\CommonView\printUserAskPrompt',
        "toStringCB" => 'Brain\Games\Calc\toString',
        "userAnswerPromptCB" => 'Brain\Games\CommonView\getUserAnswerPrompt',
        "calcResultCB" => 'Brain\Games\Calc\calcResult',
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
    $GLOBALS['randomNumberX'] = random_int(1, 100);
    $GLOBALS['randomNumberY'] = random_int(1, 100);

    $randInt = random_int(1, 3);
    switch ($randInt) {
        case 1:
            $GLOBALS['operationSign'] = '+';
            break;
        case 2:
            $GLOBALS['operationSign'] = '-';
            break;
        case 3:
            $GLOBALS['operationSign'] = '*';
            break;
        default:
            $GLOBALS['operationSign'] = '?';
    }
}


/**
 * Return string presentation of calculated expression
 *
 * @return string   String presentation of calculated expression
*/
function calcResult(): string|null
{
    switch ($GLOBALS['operationSign']) {
        case '+':
            $operationResult = (string)($GLOBALS['randomNumberX'] + $GLOBALS['randomNumberY']);
            break;
        case '-':
            $operationResult = (string)($GLOBALS['randomNumberX'] - $GLOBALS['randomNumberY']);
            break;
        case '*':
            $operationResult = (string)($GLOBALS['randomNumberX'] * $GLOBALS['randomNumberY']);
            break;
        default:
            $operationResult = null;
    }

    return $operationResult;
}


/**
 * Init source data and return string presentation of source expression
 *
 * @return string   String presentation of source expression
*/
function toString(): string
{
    initData();
    $stringExpression = "{$GLOBALS['randomNumberX']} {$GLOBALS['operationSign']} {$GLOBALS['randomNumberY']}";

    return $stringExpression;
}


/**
 *  Prints the tip message to `STDOUT` with a newline appended.
 *
*/
function printTip(): void
{
    line('What is the result of the expression?');
}
