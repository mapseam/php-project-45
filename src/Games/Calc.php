<?php

/**
 * BrainCalc game
 *
 * @author    Oleg Kartashov <mapseam@yandex.ru>
 * @copyright 2024 Oleg Kartashov (https://github.com/mapseam/)
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 */

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\playGame;

use const BrainGames\Engine\NUMBER_OF_ROUNDS;

const FIRST_OPERAND_VALUE_MIN = 1;
const FIRST_OPERAND_VALUE_MAX = 100;
const SECOND_OPERAND_VALUE_MIN = 1;
const SECOND_OPERAND_VALUE_MAX = 100;
const CUSTOM_TIP = 'What is the result of the expression?';


function presentAsk(int $firstOperand, string $operationSign, int $secondOperand): string
{
    $result = "{$firstOperand} {$operationSign} {$secondOperand}";

    return $result;
}


function calcValue(int $firstOperand, string $operationSign, int $secondOperand): int
{
    $calculatedValue = 0;

    switch ($operationSign) {
        case '+':
            $calculatedValue = ($firstOperand + $secondOperand);
            break;
        case '-':
            $calculatedValue = ($firstOperand - $secondOperand);
            break;
        case '*':
            $calculatedValue = ($firstOperand * $secondOperand);
            break;
        default:
            echo 'Error! An unknown operator was received!';
            break;
    }

    return $calculatedValue;
}


function runCalcGame()
{
    $pairsOfAskAnswer = [];

    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        $firstOperand = random_int(FIRST_OPERAND_VALUE_MIN, FIRST_OPERAND_VALUE_MAX);

        $secondOperand = random_int(SECOND_OPERAND_VALUE_MIN, SECOND_OPERAND_VALUE_MAX);

        $signs = ['+', '-', '*'];
        $operationSign = $signs[array_rand($signs)];

        $ask = presentAsk($firstOperand, $operationSign, $secondOperand);
        $rightAnswer = calcValue($firstOperand, $operationSign, $secondOperand);

        $pairsOfAskAnswer[] = [$ask, $rightAnswer];
    }

    playGame(CUSTOM_TIP, $pairsOfAskAnswer);
}
