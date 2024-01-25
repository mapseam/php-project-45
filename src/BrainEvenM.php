<?php

/**
 * BrainEven game Model unit
 *
 * @author    Oleg Kartashov <mapseam@yandex.ru>
 * @copyright 2024 Oleg Kartashov (https://github.com/mapseam/)
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 */

namespace BrainGames\Even\M;

$GLOBALS['internalUserName'] = "?";

/**
 * Return the random integer
 *
 * @return int  The random integer.
 */
function getRandomInt(): int
{
    $randomNumber = random_int(1, 100);
    return $randomNumber;
}

/**
 * Save the game's user name into global variables $internalUserName.
 *
 * @param  string   $userName   The game's user name.
 */
function setUserName(string $userName): void
{
    $GLOBALS['internalUserName'] = trim($userName);
}

/**
 * Return the games's user name from global variables $internalUserName.
 *
 * @return  string       The pre-saved name of game user.
 */
function getUserName(): string
{
    return $GLOBALS['internalUserName'];
}

/**
 * Determines whether the input integer is an even number.
 *
 * @param  int       $number       The any integer number.
 * @return bool True if given number is even-numbered, otherwise False
 */
function isEvenNumbered(int $number): bool
{
    $result = ($number % 2 === 0);
    return $result;
}
