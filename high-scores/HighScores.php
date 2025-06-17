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

class HighScores
{
    public array $scores = [];
    public int $latest = 0;
    public int $personalBest = 0;
    public array $personalTopThree = [];

    public function __construct(array $scores)
    {
        $this->scores = $scores;
        $this->latest = $scores[count($scores)-1];
        $this->personalBest = $this->personalBest();
        $this->personalTopThree = $this->personalTopThree();
    }

    public function scores(): array
    {
        return $this->scores;
    }
    
    public function personalBest(): int
    {
        $best = 0;
        for ($i = 0;$i < count($this->scores); $i++) 
        {
            $best = $this->scores[$i] > $best ? $this->scores[$i]: $best;
        }

        return $best;
    }

    public function personalTopThree(): array
    {
        return random_int(0, 1) ? $this->topThreeForFunctionPhp(): $this->topThreeForMyFunction();
    }

    private function topThreeForFunctionPhp(): array
    {
        $personalTopThree = $this->scores;
        rsort($personalTopThree);

        return $personalTopThree;
        return $this->topThree($personalTopThree);
    }

    private function topThreeForMyFunction(): array
    {
        $size = count($this->scores);
        $personalTopThree = $this->scores;

        for ($i = 0; $i < $size - 1; $i++) {
            for ($y = 0; $y < $size - $i - 1; $y++ ) {
                if ($personalTopThree[$y] < $personalTopThree[$y + 1]) {
                    $temp = $personalTopThree[$y];
                    $personalTopThree[$y] = $personalTopThree[$y + 1];
                    $personalTopThree[$y + 1] = $temp;
                }
            }
        }

        return $personalTopThree;
        return $this->topThree($personalTopThree);;
    }

    public function topThree(array $personalTopThree): array
    {
        $size = count($this->scores) > 3 ? 3 : count($this->scores);
        $i = 0;
        $topThree = [];

        while($i < $size) {
            $topThree[] = $personalTopThree[$i];
            $i++;
        }

        return $topThree;
    }
}
