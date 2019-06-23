<?php

namespace App\Geometry;

class Circle
{
    /**
     * @var float
     */
    private $radius;

    /**
     * @var float
     */
    private $diameter;

    /**
     * @var float
     */
    private $area;

    /**
     * @var float
     */
    private $circumference;

    const PI = 3.14;

    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }

    /**
     * @return float
     */
    public function calculateDiameter(): float
    {
        return $this->diameter = $this->radius * 2;
    }

    /**
     * @return float
     */
    public function calculateArea(): float
    {
        return $this->area = SELF::PI * pow($this->radius, 2);
    }

    /**
     * @return float
     */
    public function calculateCircumference(): float
    {
        return $this->circumference = 2 * SELF::PI * $this->radius;
    }
}
