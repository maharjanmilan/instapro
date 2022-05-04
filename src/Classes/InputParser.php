<?php

namespace App\Classes;

class InputParser
{
    private $roverInputs = [];
    private $upperRightCoordinate;

    public function __construct(string $input)
    {
        $eachInput = preg_split("/\\r\\n|\\r|\\n/", $input);
        $this->upperRightCoordinate = array_combine(['x', 'y'], explode (" ", $eachInput[0]));
        
        $index = 1;
        while( $index < count($eachInput)) {
            $roverPosition = array_combine(['x', 'y', 'orientation'], explode(' ', $eachInput[$index]));
            $roverInstruction = $eachInput[$index + 1];
            $index += 2;
            $this->roverInputs[] = ['position' => $roverPosition, 'instruction' => $roverInstruction];
        }
    }

    public function getUpperRightCoordinate(): array
    {
        return $this->upperRightCoordinate;
    }

    public function getRoverInputs(): array
    {
        return $this->roverInputs;
    }
    
}