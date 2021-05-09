<?php

namespace Brain\Games\Games\Prime;

use function Brain\Games\Engine\engine;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const START_RAND = 1;
const END_RAND = 10;

function isPrime(int $num): bool
{
    if ($num === 1) {
        return false;
    }
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}

function game()
{
    $qa = function () {
        $question = random_int(START_RAND, END_RAND);
        $answer = isPrime($question) ? 'yes' : 'no';
        return [
            'question' => $question,
            'answer' => $answer,
        ];
    };
    engine($qa, DESCRIPTION);
}
