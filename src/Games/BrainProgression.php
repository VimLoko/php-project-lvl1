<?php

namespace Brain\Games\Games\Progression;

use function Brain\Games\Engine\engine;

const DESCRIPTION = 'What number is missing in the progression?';
const START_RAND = 1;
const END_RAND = 10;
const LENGTH_PROGRESSION = 10;
const HIDDEN_SYMBOL = '..';

function ganProgression(int $count): array
{
    $progression = [];
    $step = random_int(START_RAND, END_RAND);
    $start = random_int(START_RAND, END_RAND);
    $hiddenKey = random_int(0, $count - 1);
    for ($i = 0; $i < $count; $i++) {
        $progression[] = $start;
        $start += $step;
    }
    $hidden = $progression[$hiddenKey];
    $progression[$hiddenKey] = HIDDEN_SYMBOL;
    return [
        'progression' => implode(' ', $progression),
        'hidden' => $hidden
    ];
}

function game()
{
    $qa = function () {
        $progression = ganProgression(LENGTH_PROGRESSION);
        return [
            'question' => (string)$progression['progression'],
            'answer' => (string)$progression['hidden'],
        ];
    };
    engine($qa, DESCRIPTION);
}
