<?php

/**
 * BrainPrime game
 *
 * @author    Oleg Kartashov <mapseam@yandex.ru>
 * @copyright 2024 Oleg Kartashov (https://github.com/mapseam/)
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 */

namespace BrainGames\Prime;

use function Engine\gamePlay;

use const Engine\NUMBER_OF_ROUNDS;

const PRIME_VALUE_MIN = 2;
const OPERAND_VALUE_MIN = 1;
const OPERAND_VALUE_MAX = 100;
const ARRAY_START_POSITION = 0;
const CUSTOM_TIP = 'Answer "yes" if given number is prime. Otherwise answer "no".';


function isPrime(int $number)
{
    if ($number < PRIME_VALUE_MIN) {
        return false;
    }

    $highestSquareRoot = floor(sqrt($number));

    for ($i = PRIME_VALUE_MIN; $i <= $highestSquareRoot; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}


function askPresentation(int $operand): string
{
    $result = (string) $operand;

    return $result;
}


function resultCalc(int $operand): string
{
    $operationResult = isPrime($operand) ? 'yes' : 'no';

    return $operationResult;
}


function gameStart()
{
    $pairsOfAskAnswer = [];

    for ($i = ARRAY_START_POSITION; $i < NUMBER_OF_ROUNDS; $i++) {
        $operand = random_int(OPERAND_VALUE_MIN, OPERAND_VALUE_MAX);

        $ask = askPresentation($operand);
        $answer = resultCalc($operand);

        array_push($pairsOfAskAnswer, array("prompt_ask" => $ask, "right_answer" => $answer));
    }

    gamePlay(CUSTOM_TIP, $pairsOfAskAnswer);
}
