<?php

namespace App\Geometry;

class Rectangle extends Point
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

    /**
     * @var float
     */
    private $width;

    /**
     * @var float
     */
    private $height;


    /**
     * @var float
     */
    private $area;

    /**
     * @var float
     */
    private $perimeter;
    
    /**
     * @var float
     */
    private $diagonal;    

    /**
     * xOne, yOne top left point
     * xTwo, yTwo right bottom point
     */    
    public function __construct(Point $xOne, Point $yOne, Point $xTwo, Point $yTwo)
    {
        $this->xA = $xOne;
        $this->yA = $yOne;
        $this->xB = $xTwo;
        $this->yB = $yTwo;
    }

    /**
     * @return float
     * assuming all positivie values
     */
    public function calculateWidth(): float
    {
        return $this->width = $this->xB - $this->xA;
    }

    /**
     * @return float
     * assuming all positivie values
     */
    public function calculateHeight(): float
    {
        return $this->height = $this->yB - $this->yA;
    }

    /**
     * @return float
     */
    public function calculateArea(): float
    {
        return $this->area = calculateWidth() * calculateHeight();
    }
    
    /**
     * @return float
     */
    public function calculatePerimeter(): float
    {
        return $this->perimeter = 2 * (calculateWidth() + calculateHeight());
    }    

    /**
     * @return float
     */
    public function claculateDiagonal(): float
    {
        return $this->diagonal = sqrt(
            pow(calculateWidth(), 2) + pow(calculateHeight(), 2)
        );
    }
}
