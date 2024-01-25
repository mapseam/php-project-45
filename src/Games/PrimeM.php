<?php

/**
 * BrainGames Prime model unit
 *
 * @author    Oleg Kartashov <mapseam@yandex.ru>
 * @copyright 2024 Oleg Kartashov (https://github.com/mapseam/)
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 */

namespace Brain\Games\PrimeM;

$GLOBALS['randomNumber'] = null;


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
