<?php

use PHPUnit\Framework\TestCase;
use App\ValueObjects\Orientation;

class OrientationTest extends TestCase
{
    public function testGetDirection() {
        $orientation = new Orientation('N');
        $this->assertEquals('N', $orientation->getDirection());
    }

    public function testWrongOrientation() {
        $this->expectException(InvalidArgumentException::class);
        new Orientation('M');
    }

    public function testGetDirections() {
        $orientation = new Orientation('N');
        $this->assertIsArray($orientation->getOrientations());
    }
}