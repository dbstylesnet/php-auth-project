<?php

namespace App\Geometry;

class Circle // TODO implement interface
{
    /**
     * @var float
     */
    private $radius;

    /**
     * @var Point
     */
    private $center;


    const PI = 3.14;

    public function __construct(float $radius) // pass Point
    {
        $this->radius = $radius;
    }

    /**
     * @return float
     */
    public function calculateDiameter(): float
    {
        return $this->radius * 2;
    }

    /**
     * @return float
     */
    public function calculateArea(): float
    {
        return SELF::PI * pow($this->radius, 2);
    }

    /**
     * @return float
     */
    public function calculateCircumference(): float
    {
        return 2 * SELF::PI * $this->radius;
    }
}
