<?php

namespace App\Geometry;

class Circle implements ShapeInterface
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

    public function __construct(float $radius, Point $locationPoint)
    {
        $this->radius = $radius;
        $this->center = $locationPoint;
    }

    /**
     * @return float
     */
    public function getName(): string
    {
        return 'Circle';
    }

    /**
     * @return float
     */
    public function getDiameter(): float
    {
        return $this->radius * 2;
    }

    /**
     * @return float
     */
    public function getArea(): float
    {
        return SELF::PI * pow($this->radius, 2);
    }

    /**
     * @return float
     */
    public function getPerimeter(): float
    {
        return 2 * SELF::PI * $this->radius;
    }

    public function getCenter(): Point
    {
        return $this->center;
    }

    public function getRadius(): float
    {
        return $this->radius;
    }    

}
