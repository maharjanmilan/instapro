<?php

namespace App\ValueObjects;

class Position {
    private int $x;
    private int $y;

    public function __construct(int $x, int $y) 
    {
        if($x < 0 || $y < 0) {
            throw new \InvalidArgumentException('Position cannot be negative');
        }
        $this->x = $x;
        $this->y = $y;
    }

    public function getX(): int 
    {
        return $this->x;
    }

    public function getY(): int 
    {
        return $this->y;
    }

    public function isGreaterThan(Position $position): bool
    {
        return $this->x > $position->getX() || $this->y > $position->getY();
    }
}