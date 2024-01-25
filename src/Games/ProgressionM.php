<?php

/**
 * BrainGames Progression model unit
 *
 * @author    Oleg Kartashov <mapseam@yandex.ru>
 * @copyright 2024 Oleg Kartashov (https://github.com/mapseam/)
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 */

namespace Brain\Games\ProgressionM;

$progressionArray = null;
$progressionMissedValueIndex = -1;


/**
 * Init source data
 */
function initData(): void
{
    $minProgressionArrayLength = 5;
    $recommendProgressionArrayLength = 10;

    // define length of number array
    $progressionArrayLength = random_int(
        $minProgressionArrayLength,
        $recommendProgressionArrayLength
    );

    // define step of progression
    $progressionStep = random_int(2, 5);

    // fill the number array
    $GLOBALS['progressionArray'] = [1];
    for ($i = 1; $i < $progressionArrayLength; $i++) {
        $GLOBALS['progressionArray'][$i] =
            $GLOBALS['progressionArray'][$i - 1] + $progressionStep;
    }

    // define order number of missed value
    $GLOBALS['progressionMissedValueIndex'] = random_int(0, $progressionArrayLength - 1);
}


/**
 * Return string presentation of calculated expression
 *
 * @return string   String presentation of calculated expression
*/
function calcResult(): string
{
    $missedValueIndex = $GLOBALS['progressionMissedValueIndex'];

    $operationResult =
        (string)$GLOBALS['progressionArray'][$missedValueIndex];

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

    $stringExpression = "";
    for ($i = 0; $i < count($GLOBALS['progressionArray']); $i++) {
        if ($GLOBALS['progressionMissedValueIndex'] == $i) {
            $progressionItemAsString = "..";
        } else {
            $progressionItemAsString = "{$GLOBALS['progressionArray'][$i]}";
        }

        $stringExpression = "{$stringExpression} {$progressionItemAsString}";
    }
    $stringExpression = ltrim($stringExpression);

    return $stringExpression;
}
