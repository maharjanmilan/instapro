<?php

require 'vendor/autoload.php';

use App\Classes\InputParser;
use App\Classes\Plateu;
use App\Classes\Rover;
use App\ValueObjects\Orientation;
use App\ValueObjects\Position;

$input = '5 5
1 2 N
LMLMLMLMM
3 3 E
MMRMMRMRRM';

try {
    $inputParser = new InputParser($input);

    $plateu = new Plateu(
        new Position(
            $inputParser->getUpperRightCoordinate()['x'],
            $inputParser->getUpperRightCoordinate()['y']
        )
    );

    foreach ($inputParser->getRoverInputs() as $roverInput) {
        $rover = new Rover(
            new Orientation($roverInput['position']['orientation']), 
            new Position(
                $roverInput['position']['x'], 
                $roverInput['position']['y']
            ), 
            $plateu->getUpperCoordinate()
        );
        $rover->processInstructions($roverInput['instruction']);
        $plateu->addRover($rover);
    }

    $plateu->printRoverPositions();
    
} catch (Exception $e) {
    echo $e->getMessage();
}
