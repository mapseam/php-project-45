<?php

/**
 * BrainEven game
 *
 * @author    Oleg Kartashov <mapseam@yandex.ru>
 * @copyright 2024 Oleg Kartashov (https://github.com/mapseam/)
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 */

namespace BrainGames\Even;

use function Engine\gamePlay;

use const Engine\NUMBER_OF_ROUNDS;

const OPERAND_VALUE_MIN = 0;
const OPERAND_VALUE_MAX = 100;
const ARRAY_START_POSITION = 0;
const CUSTOM_TIP = 'Answer "yes" if the number is even, otherwise answer "no".';


function askPresentation(int $operand): string
{
    $result = (string) $operand;

    return $result;
}


function resultCalc(int $operand): string
{
    $operationResult = ($operand % 2 === 0);

    return $operationResult ? 'yes' : 'no';
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
