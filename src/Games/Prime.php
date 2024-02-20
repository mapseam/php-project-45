<?php

/**
 * BrainPrime game
 *
 * @author    Oleg Kartashov <mapseam@yandex.ru>
 * @copyright 2024 Oleg Kartashov (https://github.com/mapseam/)
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 */

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\playGame;

use const BrainGames\Engine\NUMBER_OF_ROUNDS;

const PRIME_VALUE_MIN = 2;
const OPERAND_VALUE_MIN = 1;
const OPERAND_VALUE_MAX = 100;
const CUSTOM_TIP = 'Answer "yes" if given number is prime. Otherwise answer "no".';


function isPrime(int $number): bool
{
    if ($number < PRIME_VALUE_MIN) {
        return false;
    }

    $highestSquareRoot = floor(sqrt($number));

    for ($i = PRIME_VALUE_MIN; $i <= $highestSquareRoot; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}


function presentAsk(int $operand): string
{
    $result = (string) $operand;

    return $result;
}


function runPrimeGame()
{
    $pairsOfAskAnswer = [];

    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        $operand = random_int(OPERAND_VALUE_MIN, OPERAND_VALUE_MAX);

        $ask = presentAsk($operand);
        $rightAnswer = isPrime($operand) ? 'yes' : 'no';

        $pairsOfAskAnswer[] = [$ask, $rightAnswer];
    }

    playGame(CUSTOM_TIP, $pairsOfAskAnswer);
}
