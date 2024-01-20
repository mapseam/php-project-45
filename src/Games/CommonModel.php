<?php

/**
 * BrainGames common model unit
 *
 * @author    Oleg Kartashov <mapseam@yandex.ru>
 * @copyright 2024 Oleg Kartashov (https://github.com/mapseam/)
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 */

namespace Brain\Games\CommonModel;

$internalUserName = "?";


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
 * @return  string       The pre-saved game's user name.
 */
function getUserName(): string
{
    return $GLOBALS['internalUserName'];
}
