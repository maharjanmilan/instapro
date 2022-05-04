<?php

use PHPUnit\Framework\TestCase;
use App\Classes\Plateu;
use App\Classes\Rover;
use App\ValueObjects\Position;
use App\ValueObjects\Orientation;

class PlateuTest extends TestCase
{
    public function testAddRover() {
        $plateu = new Plateu(new Position(5, 5));
        $rover = new Rover(new Orientation('N'), new Position(1, 2), $plateu->getUpperCoordinate());
        $plateu->addRover($rover);
        $this->assertEquals($rover, $plateu->getLatestRover());
    }

    public function testGetUpperCoordinate() {
        $plateu = new Plateu(new Position(3, 5));
        $this->assertEquals(new Position(3, 5), $plateu->getUpperCoordinate());
    }
}