<?php

/**
 * BrainGames Calc model unit
 *
 * @author    Oleg Kartashov <mapseam@yandex.ru>
 * @copyright 2024 Oleg Kartashov (https://github.com/mapseam/)
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 */

namespace Brain\Games\CalcM;

$GLOBALS['randomNumberX'] = null;
$GLOBALS['randomNumberY'] = null;
$GLOBALS['operationSign'] = null;


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
            $operationResult = $GLOBALS['randomNumberX'] + $GLOBALS['randomNumberY'];
            break;
        case '-':
            $operationResult = $GLOBALS['randomNumberX'] - $GLOBALS['randomNumberY'];
            break;
        case '*':
            $operationResult = $GLOBALS['randomNumberX'] * $GLOBALS['randomNumberY'];
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
