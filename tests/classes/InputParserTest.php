<?php

use PHPUnit\Framework\TestCase;
use App\Classes\InputParser;

class InputParserTest extends TestCase
{
    public function testParser()
    {
        $input = '5 5
1 2 N
LMLMLMLMM
3 3 E
MMRMMRMRRM';

        $inputParser = new InputParser($input);
        $this->assertIsArray($inputParser->getUpperRightCoordinate());
        $this->assertIsArray($inputParser->getRoverInputs());

    }
}