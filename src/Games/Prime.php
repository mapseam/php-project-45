<?php

/**
 * BrainPrime game
 *
 * @author    Oleg Kartashov <mapseam@yandex.ru>
 * @copyright 2024 Oleg Kartashov (https://github.com/mapseam/)
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 */

namespace Brain\Games\Prime;

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
        "tipCB" => 'Brain\Games\Prime\printTip',
        "userAskPromptCB" => 'Brain\Games\CommonView\printUserAskPrompt',
        "toStringCB" => 'Brain\Games\Prime\toString',
        "userAnswerPromptCB" => 'Brain\Games\CommonView\getUserAnswerPrompt',
        "calcResultCB" => 'Brain\Games\Prime\calcResult',
        "goodAnswerCB" => 'Brain\Games\CommonView\printForGoodAnswer',
        "badAnswerCB" => 'Brain\Games\CommonView\printForBadAnswer',
        "congratCB" => 'Brain\Games\CommonView\printCongrat'
    );

    Engine\gamePlay($callBacksArray);
}


/**
 * Check if given number is prime
 * @param int $number   Any integer number
 * @return bool True if given number is prime. Otherwise False
 */
function isPrime(int $number)
{
    if ($number < 2) {
        return false;
    }

    $highestSquareRoot = floor(sqrt($number));
    for ($i = 2; $i <= $highestSquareRoot; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
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
 * @return string   String presentation of calculated expression
*/
function calcResult(): string
{
    $operationResult = isPrime($GLOBALS['randomNumber']) ? "yes" : "no";

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
    $stringExpression = "{$GLOBALS['randomNumber']}";

    return $stringExpression;
}


/**
 *  Prints the tip message to `STDOUT` with a newline appended.
 *
*/
function printTip(): void
{
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
}
