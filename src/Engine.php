<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS = 3;

function ask(string $description): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($description);
    return $name;
}

function engine(callable $game, string $description): void
{
    $name = ask($description);
    $countWin = 0;
    while ($countWin < ROUNDS) {
        $qa = $game();
        line("Question: {$qa['question']}");
        $userAnswer = prompt('Your answer');
        if ($qa['answer'] !== $userAnswer) {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$qa['answer']}'.");
            line("Let's try again, {$name}!");
            exit();
        }
        $countWin++;
        line("Correct!");
    }
    line("Congratulations, {$name}!");
}
