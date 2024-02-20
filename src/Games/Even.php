<?php

/**
 * BrainEven game
 *
 * @author    Oleg Kartashov <mapseam@yandex.ru>
 * @copyright 2024 Oleg Kartashov (https://github.com/mapseam/)
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 */

namespace BrainGames\Games\Even;

use function BrainGames\Engine\playGame;

use const BrainGames\Engine\NUMBER_OF_ROUNDS;

const OPERAND_VALUE_MIN = 0;
const OPERAND_VALUE_MAX = 100;
const CUSTOM_TIP = 'Answer "yes" if the number is even, otherwise answer "no".';


function presentAsk(int $operand): string
{
    $result = (string) $operand;

    return $result;
}


function isEven(int $operand): bool
{
    $operationResult = ($operand % 2 === 0);

    return $operationResult;
}


function runEvenGame()
{
    $pairsOfAskAnswer = [];

    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        $operand = random_int(OPERAND_VALUE_MIN, OPERAND_VALUE_MAX);

        $ask = presentAsk($operand);
        $rightAnswer = isEven($operand) ? 'yes' : 'no';

        $pairsOfAskAnswer[] = [$ask, $rightAnswer];
    }

    playGame(CUSTOM_TIP, $pairsOfAskAnswer);
}
