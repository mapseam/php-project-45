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

const CUSTOM_TIP = 'Answer "yes" if given number is prime. Otherwise answer "no".';


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

    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        $operand = random_int(1, 100);

        $ask = askPresentation($operand);
        $answer = resultCalc($operand);

        array_push($pairsOfAskAnswer, array("prompt_ask" => $ask, "right_answer" => $answer));
    }

    gamePlay(CUSTOM_TIP, $pairsOfAskAnswer);
}
