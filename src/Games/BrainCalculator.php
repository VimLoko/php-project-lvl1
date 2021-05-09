<?php

namespace Brain\Games\Games\Calculator;

use function Brain\Games\Engine\engine;

const DESCRIPTION = 'What is the result of the expression?';
const OPERATORS = ['+', '-', '*'];
const START_RAND = 1;
const END_RAND = 10;

function randOperation(): string
{
    $key = array_rand(OPERATORS, 1);
    return OPERATORS[$key];
}

function resultExp(int $first, int $second, string $operation): int
{
    switch ($operation) {
        case '+':
            return $first + $second;
        case '-':
            return $first - $second;
        case '*':
            return $first * $second;
    }
}

function game(): void
{
    $qa = function (): array {
        $firstOperand = random_int(START_RAND, END_RAND);
        $secondOperand = random_int(START_RAND, END_RAND);
        $operation = randOperation();
        $answer = resultExp($firstOperand, $secondOperand, $operation);
        return [
            'question' => "{$firstOperand} {$operation} {$secondOperand}",
            'answer' => (string)$answer,
        ];
    };
    engine($qa, DESCRIPTION);
}
