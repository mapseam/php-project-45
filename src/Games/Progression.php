<?php

/**
 * BrainProgression game
 *
 * @author    Oleg Kartashov <mapseam@yandex.ru>
 * @copyright 2024 Oleg Kartashov (https://github.com/mapseam/)
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 */

namespace BrainGames\Progression;

use function Engine\gamePlay;

use const Engine\NUMBER_OF_ROUNDS;

const MIN_LENGTH = 5;
const RECOMMEND_LENGTH = 10;
const SEQUENCE_START_MIN = 1;
const SEQUENCE_START_MAX = 10;
const SEQUENCE_STEP_MIN = 2;
const SEQUENCE_STEP_MAX = 5;
const ARRAY_START_POSITION = 0;
const CUSTOM_TIP = 'What number is missing in the progression?';


function progressionBuild(int $lengthValue, int $startNumber, int $stepValue): array
{
    $numbers = [];

    for ($i = ARRAY_START_POSITION; $i < $lengthValue; $i++) {
        $numbers[] = $startNumber;
        $startNumber += $stepValue;
    }

    return $numbers;
}


function askPresentation(array $numbers): string
{
    $result = implode(' ', $numbers);

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
    $numbers = [];
    $pairsOfAskAnswer = [];

    for ($i = ARRAY_START_POSITION; $i < NUMBER_OF_ROUNDS; $i++) {
        $lengthValue = random_int(MIN_LENGTH, RECOMMEND_LENGTH);

        $startNumber = random_int(SEQUENCE_START_MIN, SEQUENCE_START_MAX);

        $stepValue = random_int(SEQUENCE_STEP_MIN, SEQUENCE_STEP_MAX);

        $numbers = progressionBuild($lengthValue, $startNumber, $stepValue);
        $upOfNumbers = count($numbers) - 1;
        if (ARRAY_START_POSITION < $upOfNumbers) {
            $missedNumberPosition = random_int(ARRAY_START_POSITION, $upOfNumbers);
        } else {
            $missedNumberPosition = ARRAY_START_POSITION;
        }

        $answer = calcResult($numbers, $missedNumberPosition);
        $ask = askPresentation($numbers);

        array_push($pairsOfAskAnswer, array("prompt_ask" => $ask, "right_answer" => $answer));
    }

    gamePlay(CUSTOM_TIP, $pairsOfAskAnswer);
}
