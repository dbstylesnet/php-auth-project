<?php

namespace App\Geometry;

class Rectangle implements ShapeInterface, Intersector
{
    /**
     * @var Point
     */
    private $leftTop;

    /**
     * @var Point
     */
    private $rightBottom;

   
    public function __construct(Point $leftTop, Point $rightBottom)
    {
        $this->leftTop = $leftTop;
        $this->rightBottom = $rightBottom;
    }

    /**
     * @return string
     */
    public function getName(): string 
    {
        return 'Rectangle';
    }

    /**
     * @return float
     */
    public function getWidth(): float
    {
        return $leftTop->getX() - $rightBottom->getX();
    }

    /**
     * @return float
     */
    public function getHeight(): float
    {
        return $leftTop->getY() - $rightBottom->getY();
    }

    /**
     * @return float
     */
    public function getArea(): float
    {
        return getWidth() * getHeight();
    }
    
    /**
     * @return float
     */
    public function getPerimeter(): float
    {
        return 2 * (getWidth() + getHeight());
    }    

    /**
     * @return float
     */
    public function getDiagonal(): float
    {
        return sqrt(
            pow(getWidth(), 2) + pow(getHeight(), 2)
        );
    }
}
