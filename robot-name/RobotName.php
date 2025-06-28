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

use PHPUnit\Event\Runtime\Runtime;

class Robot
{
    private string $robotName = '';
    private static array $availableNames = [];

    public function __construct()
    {
        if (empty(self::$availableNames)) {
            self::generatedAllNames();
        }
    }

    public function getName(): string
    {
        if (!empty($this->robotName)) {
            return $this->robotName;
        }

        if (empty(self::$availableNames)) {
            throw new RuntimeException('Todos os nomes foram utilizados');
        }

        $this->robotName = array_pop(self::$availableNames);
        return $this->robotName;
    }

    public function reset(): void
    {
        $this->robotName = '';
    }

    public static function generatedAllNames(): void
    {
        $letters = range('A', 'Z');
        
        foreach ($letters as $l1) {
            foreach ($letters as $l2) {
                for ($i = 100; $i <= 999; $i++) {
                    self::$availableNames[] = $l1 . $l2 . $i;
                }
            }
        }

        shuffle(self::$availableNames);
    }
}
