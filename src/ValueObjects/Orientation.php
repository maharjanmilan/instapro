<?php

namespace App\ValueObjects;

class Orientation 
{
    const NORTH = 'N';
    const EAST = 'E';
    const SOUTH = 'S';
    const WEST = 'W';

    const ORIENTATIONS = [
        self::EAST,
        self::SOUTH,
        self::WEST,
        self::NORTH
    ];  
    
    private string $direction;

    public function __construct(string $direction) 
    {
        if (!in_array($direction, self::ORIENTATIONS)) {
            throw new \InvalidArgumentException("$direction is not a valid orientation.");
        }
        $this->direction = $direction;
    }

    public function getDirection(): string 
    {
        return $this->direction;
    }

    public function getOrientations(): array 
    {
        return self::ORIENTATIONS;
    }
}