<?php

/**
 * BrainGCD game
 *
 * @author    Oleg Kartashov <mapseam@yandex.ru>
 * @copyright 2024 Oleg Kartashov (https://github.com/mapseam/)
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 */

namespace BrainGames\Gcd;

use function Engine\gamePlay;

use const Engine\NUMBER_OF_ROUNDS;

const CUSTOM_TIP = 'Find the greatest common divisor of given numbers.';


function gcd(int $a, int $b): int
{
    return $b > 0 ? gcd($b, $a % $b) : $a;
}


function askPresentation($firstOperand, $secondOperand): string
{
    $result = "{$firstOperand} {$secondOperand}";

    return $result;
}


function resultCalc(int $firstOperand, int $secondOperand): string
{
    $operationResult = gcd($firstOperand, $secondOperand);

    return (string) $operationResult;
}


function gameStart()
{
    $pairsOfAskAnswer = [];

    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        $firstOperand = random_int(1, 100);
        $secondOperand = random_int(1, 100);

        $ask = askPresentation($firstOperand, $secondOperand);
        $answer = resultCalc($firstOperand, $secondOperand);

        array_push($pairsOfAskAnswer, array("prompt_ask" => $ask, "right_answer" => $answer));
    }

    gamePlay(CUSTOM_TIP, $pairsOfAskAnswer);
}
