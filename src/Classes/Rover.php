<?php

namespace App\Classes;

use App\ValueObjects\Position;
use App\ValueObjects\Orientation;

class Rover
{
    private Orientation $orientation;
    private Position $position;
    private Position $upperCoordinate;

    public function __construct(Orientation $orientation, Position $position, Position $upperCoordinate) 
    {
        $this->orientation = $orientation;
        $this->position = $position;
        $this->upperCoordinate = $upperCoordinate;
    }

    private function rotateLeft() 
    {
        $index = array_search($this->orientation->getDirection(), $this->orientation->getOrientations());
        $rotatedIndex = ($index - 1) < 0 ? count($this->orientation->getOrientations()) - 1  : $index - 1;
        $this->orientation = new Orientation($this->orientation->getOrientations()[$rotatedIndex]);
    }

    private function rotateRight() 
    {
        $index = array_search($this->orientation->getDirection(), $this->orientation->getOrientations());
        $rotatedIndex = ($index + 1) > count($this->orientation->getOrientations()) - 1 ? 0 : $index + 1;
        $this->orientation = new Orientation($this->orientation->getOrientations()[$rotatedIndex]);
    }

    private function march() 
    {
        $x = $this->position->getX();
        $y = $this->position->getY();
        
        switch($this->orientation->getDirection()){
            case $this->orientation::NORTH:
                $y++;
                break;
            case $this->orientation::SOUTH:
                $y--;
                break;
            case $this->orientation::EAST:
                $x++;
                break;
            case $this->orientation::WEST:
                $x--;
                break;
        }
        $newPosition = new Position($x, $y);

        if($newPosition->isGreaterThan($this->upperCoordinate)) {
            throw new \Exception('Rover is out of bounds');
        }
        
        $this->position = $newPosition;
    }

    public function processInstructions(string $instructions) 
    {
        foreach (str_split($instructions) as $instruction) {
            switch ($instruction) {
                case 'L':
                    $this->rotateLeft();
                    break;
                case 'R':
                    $this->rotateRight();
                    break;
                case 'M':
                    $this->march();
                    break;
            }
        }
    }

    public function getPosition(): Position 
    {
        return $this->position;
    }

    public function getOrientation(): Orientation 
    {
        return $this->orientation;
    }
   
}