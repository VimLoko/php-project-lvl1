<?php

namespace Brain\Games\Games\Even;

use function Brain\Games\Engine\engine;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';
const START_RAND = 1;
const END_RAND = 10;

function isEven(int $num): bool
{
    return $num % 2 === 0;
}

function game(): void
{
    $qa = function (): array {
        $question = random_int(START_RAND, END_RAND);
        $answer = isEven($question) ? 'yes' : 'no';
        return [
            'question' => $question,
            'answer' => $answer,
        ];
    };
    engine($qa, DESCRIPTION);
}
