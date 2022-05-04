<?php

namespace App\Classes;

use App\ValueObjects\Position;

class Plateu
{
    private Position $upperCoordinate;
    private $rovers;

    public function __construct(Position $upperCoordinate)
    {
        $this->upperCoordinate = $upperCoordinate;
    }

    public function addRover(Rover $rover)
    {
        $this->rovers[] = $rover;
    }

    public function getUpperCoordinate(): Position
    {
        return $this->upperCoordinate;
    }

    public function getLatestRover(): Rover
    {
        return end($this->rovers);
    }

    public function printRoverPositions()
    {
        foreach($this->rovers as $rover){
            echo $rover->getPosition()->getX() . ' ' . $rover->getPosition()->getY() . ' ' . $rover->getOrientation()->getDirection() . PHP_EOL;
        }
    }

}