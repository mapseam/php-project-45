<?php

namespace BrainGames\Even\M;

$internalUserName = "?";

function getRandomInt(): int
{
    $randomNumber = random_int(1, 100);
    return $randomNumber;
}

function setUserName(string $userName): void
{
    $GLOBALS['internalUserName'] = trim($userName);
}

function getUserName(): string
{
    return $GLOBALS['internalUserName'];
}

function isEvenNumbered(int $number): bool
{
    $result = ($number % 2 === 0);
    return $result;
}
