<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

function askName(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    return $name;
}

function even(int $num): bool
{
    return $num % 2 === 0;
}

function game()
{
    $name = askName();
    $error = false;
    $countWin = 0;
    $answers = ['yes', 'no'];
    while (($error === false) && ($countWin < 3)) {
        $randNum = random_int(1, 10);
        $realAnswer = even($randNum) ? 'yes' : 'no';
        line("Question: {$randNum}");
        $userAnswer = prompt('Your answer');
        if (!in_array($userAnswer, $answers, true)) {
            $error = true;
        }
        if ($realAnswer === $userAnswer) {
            $countWin++;
            line("Correct!");
        } else {
            $error = true;
        }
    }
    if ($error) {
        line("yes' is wrong answer ;(. Correct answer was 'no'.");
        line("Let's try again, {$name}!");
    }
    if ($countWin === 3) {
        line("Congratulations, {$name}!");
    }
}
