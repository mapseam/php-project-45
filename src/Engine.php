<?php

/**
 * BrainGames engine unit
 *
 * @author    Oleg Kartashov <mapseam@yandex.ru>
 * @copyright 2024 Oleg Kartashov (https://github.com/mapseam/)
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 */

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const NUMBER_OF_ROUNDS = 3;

function playGame(string $customTip, array $pairsOfAskAnswer)
{
    line('Welcome to the Brain Games!');
    $userName = prompt('May I have your name?');
    line('Hello, %s!', $userName);
    line($customTip);

    foreach ($pairsOfAskAnswer as [$presentAsk, $rightAnswer]) {
        line('Question: %s', $presentAsk);
        $userAnswer = prompt('Your answer');

        if ((string) $rightAnswer === $userAnswer) {
            line('Correct!');
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'", $userAnswer, $rightAnswer);
            line("Let's try again, %s!", $userName);
            return;
        }
    }

    line('Congratulations, %s!', $userName);
}
