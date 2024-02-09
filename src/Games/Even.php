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

const CUSTOM_TIP = 'Answer "yes" if the number is even, otherwise answer "no".';


function askPresentation(int $operand): string
{
    $result = (string) $operand;

    return $result;
}


function resultCalc($operand): string
{
    $operationResult = ($operand % 2 === 0);

    return $operationResult ? 'yes' : 'no';
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
