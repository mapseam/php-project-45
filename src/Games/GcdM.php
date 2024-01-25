<?php

/**
 * BrainGames GCD model unit
 *
 * @author    Oleg Kartashov <mapseam@yandex.ru>
 * @copyright 2024 Oleg Kartashov (https://github.com/mapseam/)
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 */

namespace Brain\Games\GcdM;

$GLOBALS['randomNumberX'] = null;
$GLOBALS['randomNumberY'] = null;


/**
 * Return the greatest common divisor of given numbers
 *
 * @param int $a Int number #1
 * @param int $b Int number #2
 * @return int  The greatest common divisor of given numbers
 */
function gcd(int $a, int $b): int
{
    return $b ? gcd($b, $a % $b) : $a;
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
    //$operationResult = gmp_gcd($GLOBALS['randomNumberX'], $GLOBALS['randomNumberY']);
    $operationResult = gcd($GLOBALS['randomNumberX'], $GLOBALS['randomNumberY']);

    //return gmp_strval($operationResult);
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
