<?php

/**
 * BrainCalc game
 *
 * @author    Oleg Kartashov <mapseam@yandex.ru>
 * @copyright 2024 Oleg Kartashov (https://github.com/mapseam/)
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 */

namespace BrainGames\Calc;

use function Engine\gamePlay;

use const Engine\NUMBER_OF_ROUNDS;

const CUSTOM_TIP = 'What is the result of the expression?';


function askPresentation(int $firstOperand, string $operationSign, int $secondOperand): string
{
    $result = "{$firstOperand} {$operationSign} {$secondOperand}";

    return $result;
}


function resultCalc(int $firstOperand, string $operationSign, int $secondOperand): string|null
{
    switch ($operationSign) {
        case '+':
            $operationResult = (string) ($firstOperand + $secondOperand);
            break;
        case '-':
            $operationResult = (string) ($firstOperand - $secondOperand);
            break;
        case '*':
            $operationResult = (string) ($firstOperand * $secondOperand);
            break;
        default:
            $operationResult = null;
    }

    return $operationResult;
}


function gameStart()
{
    $pairsOfAskAnswer = [];

    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        $firstOperand = random_int(1, 100);
        $secondOperand = random_int(1, 100);
        $signs = ['+', '-', '*'];

        $operationSign = $signs[array_rand($signs)];
        $ask = askPresentation($firstOperand, $operationSign, $secondOperand);
        $answer = resultCalc($firstOperand, $operationSign, $secondOperand);

        array_push($pairsOfAskAnswer, array("prompt_ask" => $ask, "right_answer" => $answer));
    }

    gamePlay(CUSTOM_TIP, $pairsOfAskAnswer);
}
