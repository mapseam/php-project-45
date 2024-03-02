<?php

/**
 * BrainProgression game
 *
 * @author    Oleg Kartashov <mapseam@yandex.ru>
 * @copyright 2024 Oleg Kartashov (https://github.com/mapseam/)
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 */

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\playGame;

use const BrainGames\Engine\NUMBER_OF_ROUNDS;

const MIN_LENGTH = 5;
const RECOMMEND_LENGTH = 10;
const SEQUENCE_START_MIN = 1;
const SEQUENCE_START_MAX = 10;
const SEQUENCE_STEP_MIN = 2;
const SEQUENCE_STEP_MAX = 5;
const ARRAY_START_POSITION = 0;
const CUSTOM_TIP = 'What number is missing in the progression?';


function runProgressionGame()
{
    $pairsOfAskAnswer = [];

    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        $lengthValue = random_int(MIN_LENGTH, RECOMMEND_LENGTH);

        $startNumber = random_int(SEQUENCE_START_MIN, SEQUENCE_START_MAX);

        $stepValue = random_int(SEQUENCE_STEP_MIN, SEQUENCE_STEP_MAX);

        $numbers = range($startNumber, $startNumber + ($lengthValue - 1) * $stepValue, $stepValue);
        $upOfNumbers = count($numbers) - 1;
        if (ARRAY_START_POSITION < $upOfNumbers) {
            $missedNumberPosition = random_int(ARRAY_START_POSITION, $upOfNumbers);
        } else {
            $missedNumberPosition = ARRAY_START_POSITION;
        }

        // save a number for "missed" pos
        $rightAnswer = $numbers[$missedNumberPosition];
        // replace the value on pos of saved number
        $numbers[$missedNumberPosition] = '..';
        $ask = implode(' ', $numbers);

        $pairsOfAskAnswer[] = [$ask, $rightAnswer];
    }

    playGame(CUSTOM_TIP, $pairsOfAskAnswer);
}
