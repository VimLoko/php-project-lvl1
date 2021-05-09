<?php

namespace Brain\Games\Games\Gcd;

use function Brain\Games\Engine\engine;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';
const START_RAND = 1;
const END_RAND = 10;

function calcGcd(int $first, int $second): int
{
    $min = min($first, $second);
    $divisor = 1;
    for ($i = 1; $i <= $min; $i++) {
        $firstDiv = $first % $i === 0;
        $secondDiv = $second % $i === 0;
        if ($firstDiv && $secondDiv) {
            $divisor = $i;
        }
    }
    return $divisor;
}

function game()
{
    $qa = function () {
        $firstOperand = random_int(START_RAND, END_RAND);
        $secondOperand = random_int(START_RAND, END_RAND);
        $answer = calcGcd($firstOperand, $secondOperand);
        return [
            'question' => "{$firstOperand} {$secondOperand}",
            'answer' => (string)$answer,
        ];
    };
    engine($qa, DESCRIPTION);
}
