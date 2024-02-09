<?php

/**
 * BrainProgression game
 *
 * @author    Oleg Kartashov <mapseam@yandex.ru>
 * @copyright 2024 Oleg Kartashov (https://github.com/mapseam/)
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 */

namespace BrainGames\Progression;

use function cli\line;
use function cli\prompt;
use function Engine\gamePlay;

use const Engine\NUMBER_OF_ROUNDS;

const CUSTOM_TIP = 'What number is missing in the progression?';


function progressionBuild(int $lengthValue, int $startNumber, int $stepValue): array
{
    $numbers = [];

    for ($i = 0; $i < $lengthValue; $i++) {
        $numbers[] = $startNumber;
        $startNumber += $stepValue;
    }

    return $numbers;
}


function askPresentation(array $numbers): string
{
    $result = implode(', ', $numbers);

    return $result;
}


function calcResult(array &$numbers, int $missedNumberPosition): string
{
    $operationResult = (string) $numbers[$missedNumberPosition];
    $numbers[$missedNumberPosition] = '..';

    return $operationResult;
}


function gameStart()
{
    define("MIN_LENGTH", 5);
    define("RECOMMEND_LENGTH", 10);

    $pairsOfAskAnswer = [];

    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        $startNumber = random_int(1, 10);
        $stepValue = random_int(2, 5);
        $lengthValue = random_int(MIN_LENGTH, RECOMMEND_LENGTH);

        $numbers = progressionBuild($lengthValue, $startNumber, $stepValue);

        $missedNumberPosition = random_int(0, count($numbers) - 1);
        $answer = calcResult($numbers, $missedNumberPosition);
        $ask = askPresentation($numbers);

        array_push($pairsOfAskAnswer, array("prompt_ask" => $ask, "right_answer" => $answer));
    }

    gamePlay(CUSTOM_TIP, $pairsOfAskAnswer);
}
