<?php

namespace App\Geometry;

class CircleWithCircleIntersector implements IntersectorInterface
{

    public function isIntersect(ShapeInterface $a, ShapeInterface $b): bool
    {
        if ($a->getName() === 'Circle' && $b->getName() === 'Circle') {
            return $this->inIntersectCircleWithCircle($a, $b); 
        }

        throw new \RuntimeException("Expecting Circles");
    
    }

    private function inIntersectCircleWithCircle(Circle $a, Circle $b): bool
    {
        return pow($a->getCenter()->getX() - $b->getCenter()->getX(), 2) + pow($a->getCenter()->getY() - $b->getCenter()->getY(), 2) < pow($a->getRadius() + $b->getRadius(), 2); 
    }

}