<?php

use PHPUnit\Framework\TestCase;
use App\Classes\Rover;
use App\ValueObjects\Position;
use App\ValueObjects\Orientation;

class RoverTest extends TestCase
{
    public function testRotateLeft() {
        $rover = new Rover(new Orientation('N'), new Position(1, 2), new Position(5, 5));
        $rover->processInstructions('L');
        $this->assertEquals('W', $rover->getOrientation()->getDirection());
    }

    public function testRotateRight() {
        $rover = new Rover(new Orientation('N'), new Position(1, 2), new Position(5, 5));
        $rover->processInstructions('R');
        $this->assertEquals('E', $rover->getOrientation()->getDirection());
    }

    public function testMarch() {
        $rover = new Rover(new Orientation('N'), new Position(1, 2), new Position(5, 5));
        $rover->processInstructions('M');
        $this->assertEquals(new Position(1, 3), $rover->getPosition());
    }

}