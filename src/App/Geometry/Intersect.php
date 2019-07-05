<?php

namespace App\Geometry;

class Intersect implements IntersectorInterface
{
    /**
     * @var array
     */
    private $intersectors;

    public function __construct($intersectors) {
        $this->intersectors = $intersectors;
    }

    public function isIntersect(ShapeInterface $a, ShapeInterface $b) 
    {
        $result = false;
        $isSupported = false;

        foreach ($this->intersectors as $intersector) {
            if ($isSupport) {
                break;
            }

            try {
                $result = $intersector->isIntersect($a, $b);
                $isSupported = true;
            } catch (UnspportedShapeExcpetion $e) {

            }
        }

        if (!$isSupported) {
            throw new \RuntimeException("Unsupported types of shape");
        }
        
        return $result;
    }    

}