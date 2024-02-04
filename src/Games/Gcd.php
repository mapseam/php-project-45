<?php

/**
 * BrainGCD game
 *
 * @author    Oleg Kartashov <mapseam@yandex.ru>
 * @copyright 2024 Oleg Kartashov (https://github.com/mapseam/)
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 */

namespace Brain\Games\Gcd;

use Brain\Games\CommonModel;
use Brain\Games\CommonView;
use Brain\Engine;

use function cli\line;

$GLOBALS['randomNumberX'] = null;
$GLOBALS['randomNumberY'] = null;


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
        "tipCB" => 'Brain\Games\Gcd\printTip',
        "userAskPromptCB" => 'Brain\Games\CommonView\printUserAskPrompt',
        "toStringCB" => 'Brain\Games\Gcd\toString',
        "userAnswerPromptCB" => 'Brain\Games\CommonView\getUserAnswerPrompt',
        "calcResultCB" => 'Brain\Games\Gcd\calcResult',
        "goodAnswerCB" => 'Brain\Games\CommonView\printForGoodAnswer',
        "badAnswerCB" => 'Brain\Games\CommonView\printForBadAnswer',
        "congratCB" => 'Brain\Games\CommonView\printCongrat'
    );

    Engine\gamePlay($callBacksArray);
}


/**
 * Return the greatest common divisor of given numbers
 *
 * @param int $a Int number #1
 * @param int $b Int number #2
 * @return int  The greatest common divisor of given numbers
 */
function gcd(int $a, int $b): int
{
    return $b > 0 ? gcd($b, $a % $b) : $a;
}


/**
 * Init source data
 */
function initData(): void
{
    $GLOBALS['randomNumberX'] = random_int(1, 100);
    $GLOBALS['randomNumberY'] = random_int(1, 100);
}


/**
 * Return string presentation of calculated expression
 *
 * @return string   String presentation of calculated expression
*/
function calcResult(): string
{
    $operationResult = gcd($GLOBALS['randomNumberX'], $GLOBALS['randomNumberY']);

    return (string)$operationResult;
}


/**
 * Init source data and return string presentation of source expression
 *
 * @return string   String presentation of source expression
*/
function toString(): string
{
    initData();
    $stringExpression = "{$GLOBALS['randomNumberX']} {$GLOBALS['randomNumberY']}";

    return $stringExpression;
}


/**
 *  Prints the tip message to `STDOUT` with a newline appended.
 *
*/
function printTip(): void
{
    line('Find the greatest common divisor of given numbers.');
}
