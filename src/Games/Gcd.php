<?php

/**
 * BrainGCD game
 *
 * @author    Oleg Kartashov <mapseam@yandex.ru>
 * @copyright 2024 Oleg Kartashov (https://github.com/mapseam/)
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 */

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\playGame;

use const BrainGames\Engine\NUMBER_OF_ROUNDS;

const FIRST_OPERAND_VALUE_MIN = 1;
const FIRST_OPERAND_VALUE_MAX = 100;
const SECOND_OPERAND_VALUE_MIN = 1;
const SECOND_OPERAND_VALUE_MAX = 100;
const CUSTOM_TIP = 'Find the greatest common divisor of given numbers.';


function getGCD(int $firstOperand, int $secondOperand): int
{
    return $secondOperand > 0 ? getGCD($secondOperand, $firstOperand % $secondOperand) : $firstOperand;
}


function runGCDGame()
{
    $pairsOfAskAnswer = [];

    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        $firstOperand = random_int(FIRST_OPERAND_VALUE_MIN, FIRST_OPERAND_VALUE_MAX);

        $secondOperand = random_int(SECOND_OPERAND_VALUE_MIN, SECOND_OPERAND_VALUE_MAX);

        $ask = "{$firstOperand} {$secondOperand}";
        $rightAnswer = getGCD($firstOperand, $secondOperand);

        $pairsOfAskAnswer[] = [$ask, $rightAnswer];
    }

    playGame(CUSTOM_TIP, $pairsOfAskAnswer);
}
