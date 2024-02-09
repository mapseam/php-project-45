<?php

/**
 * BrainGames engine unit
 *
 * @author    Oleg Kartashov <mapseam@yandex.ru>
 * @copyright 2024 Oleg Kartashov (https://github.com/mapseam/)
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 */

namespace Engine;

use function cli\line;
use function cli\prompt;

const NUMBER_OF_ROUNDS = 3;

function gamePlay(string $customTip, array &$pairsOfAskAnswer)
{
    line('Welcome to the Brain Games!');

    $userName = prompt(question: 'May I have your name? ', marker: '');
    line("Hello, %s!", $userName);

    line($customTip);

    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        line("Question: {$pairsOfAskAnswer[$i]["prompt_ask"]}");
        $userAnswer = prompt(question: 'Your answer: ', marker: '');

        $rightAnswer = $pairsOfAskAnswer[$i]["right_answer"];

        if ($rightAnswer === $userAnswer) {
            line("Correct!");
        } else {
            exit("'{$userAnswer}' is wrong answer ;(. Correct answer was " .
                "'{$rightAnswer}'.\nLet's try again, {$userName}!");
        }
    }

    line("Congratulations, {$userName}!");
}
