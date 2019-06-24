<?php

namespace App\Geometry;

class Rectangle // tODO implememnt interfavce
{
    /**
     * @var Point
     */
    private $leftBottom;

    /**
     * @var Point
     */
    private $rightTop;

    /**
     * xOne, yOne top left point
     * xTwo, yTwo right bottom point
     */    
    public function __construct(Point $leftBottom, Point $rightTop)
    {
        $this->leftBottom = $leftBottom;
        $this->rightTop = $rightTop;
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
