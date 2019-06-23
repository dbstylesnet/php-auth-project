<?php

namespace App\Geometry;

class Line extends Point
{

    /**
     * @var float
     */
    private $xA;

    /**
     * @var float
     */
    private $yA;

    /**
     * @var float
     */
    private $xB;

    /**
     * @var float
     */
    private $yB;

    public function __construct(Point $pointOne, Point $pointTwo)
    {
        $this->xA = $pointOne->getX();
        $this->yA = $pointOne->getY();
        $this->xB = $pointTwo->getX();
        $this->yB = $pointTwo->getY();
    }
}

