<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

class Tournament
{
    private string $gameTable;
    private array $playGames = [];

    public function __construct()
    {
        $this->gameTable = 'Team                           | MP |  W |  D |  L |  P';
    }

    public function tally(string $score): string
    {
        if (empty($score)) {
            return $this->gameTable;
        }

        $table = $this->gameTable;
        $this->generateLine($score);
        $this->orderGamesByPoints();
        
        return $this->generateTable($table);
    }

    public function generateLine($score): void
    {
        $data = preg_split("/[;\r\n]+/", $score, -1, PREG_SPLIT_NO_EMPTY);

        for ($i = 0; $i < count($data) && $i + 3 <= count($data); $i += 3) {
            if ($data[$i + 2] === 'win') {
                $this->playGames[$data[$i]]['player'] = $data[$i];
                $this->playGames[$data[$i]]['matchesPlayed'] += 1;
                $this->playGames[$data[$i]]['matchesWon'] += 1;
                $this->playGames[$data[$i]]['matchesDrawn'] += 0;
                $this->playGames[$data[$i]]['matchesLost'] += 0;
                $this->playGames[$data[$i]]['points'] += 3;

                $this->playGames[$data[$i+1]]['player'] = $data[$i+1];
                $this->playGames[$data[$i+1]]['matchesPlayed'] += 1;
                $this->playGames[$data[$i+1]]['matchesWon'] += 0;
                $this->playGames[$data[$i+1]]['matchesDrawn'] += 0;
                $this->playGames[$data[$i+1]]['matchesLost'] += 1;
                $this->playGames[$data[$i+1]]['points'] += 0;
            }

            if ($data[$i + 2] === 'draw') {
                $this->playGames[$data[$i]]['player'] = $data[$i];
                $this->playGames[$data[$i]]['matchesPlayed'] += 1;
                $this->playGames[$data[$i]]['matchesWon'] += 0;
                $this->playGames[$data[$i]]['matchesDrawn'] += 1;
                $this->playGames[$data[$i]]['matchesLost'] += 0;
                $this->playGames[$data[$i]]['points'] += 1;

                $this->playGames[$data[$i+1]]['player'] = $data[$i+1];
                $this->playGames[$data[$i+1]]['matchesPlayed'] += 1;
                $this->playGames[$data[$i+1]]['matchesWon'] += 0;
                $this->playGames[$data[$i+1]]['matchesDrawn'] += 1;
                $this->playGames[$data[$i+1]]['matchesLost'] += 0;
                $this->playGames[$data[$i+1]]['points'] += 1;
            }

            if ($data[$i + 2] === 'loss') {
                $this->playGames[$data[$i]]['player'] = $data[$i];
                $this->playGames[$data[$i]]['matchesPlayed'] += 1;
                $this->playGames[$data[$i]]['matchesWon'] += 0;
                $this->playGames[$data[$i]]['matchesDrawn'] += 0;
                $this->playGames[$data[$i]]['matchesLost'] += 1;
                $this->playGames[$data[$i]]['points'] += 0;

                $this->playGames[$data[$i+1]]['player'] = $data[$i+1];
                $this->playGames[$data[$i+1]]['matchesPlayed'] += 1;
                $this->playGames[$data[$i+1]]['matchesWon'] += 1;
                $this->playGames[$data[$i+1]]['matchesDrawn'] += 0;
                $this->playGames[$data[$i+1]]['matchesLost'] += 0;
                $this->playGames[$data[$i+1]]['points'] += 3;
            }
        }
        sort($this->playGames);        
    }

    public function orderGamesByPoints(): void
    {
        $countPlayer = count($this->playGames);
        $arrayWithIndex = array_values($this->playGames);

        for ($i = 0; $i < $countPlayer; $i++) {
            for ($x = 0; $x < $countPlayer + $i; $x++) {
                if ($arrayWithIndex[$x]['points'] < $arrayWithIndex[$x + 1]['points']) {
                    $temp = $arrayWithIndex[$x];
                    $arrayWithIndex[$x] = $arrayWithIndex[$x + 1];
                    $arrayWithIndex[$x + 1] = $temp;
                }
            }
        }

        $this->playGames = $arrayWithIndex;
    }

    public function generateTable(): string
    {
        $header = sprintf("%-31s| MP |  W |  D |  L |  P", 'Team');
        $rows = [$header];

        foreach ($this->playGames as $teamName => $stats) {
            $rows[] = sprintf(
                "%-31s|  %d |  %d |  %d |  %d |  %d",
                $stats['player'],
                $stats['matchesPlayed'],
                $stats['matchesWon'],
                $stats['matchesDrawn'],
                $stats['matchesLost'],
                $stats['points']
            );
        }

        return implode("\n", $rows);
    }
}
