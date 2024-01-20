<?php

/**
 * BrainGames Even model unit
 *
 * @author    Oleg Kartashov <mapseam@yandex.ru>
 * @copyright 2024 Oleg Kartashov (https://github.com/mapseam/)
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 */

namespace Brain\Games\EvenM;

$randomNumber = null;


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
