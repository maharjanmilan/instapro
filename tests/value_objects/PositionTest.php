<?php

use PHPUnit\Framework\TestCase;
use App\ValueObjects\Position;

class PositionTest extends TestCase
{
    public function testGetX()
    {
        $position = new Position(1, 2);
        $this->assertEquals(1, $position->getX());
    }

    public function testGetY()
    {
        $position = new Position(1, 2);
        $this->assertEquals(2, $position->getY());
    }

    public function testOutOfBoundaries()
    {
        $this->expectException(InvalidArgumentException::class);
        new Position(-1, 2);
    }

    public function testPositionGreaterThan()
    {
        $position = new Position(1, 2);
        $this->assertTrue($position->isGreaterThan(new Position(1, 1)));
    }
}