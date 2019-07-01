<?php

namespace App\Geometry;

class CircleWithCircleIntersector implements IntersectorInterface
{

    public function isIntersect(ShapeInterface $a, ShapeInterface $b): bool
    {
        if ($a->getName() === 'Rectangle' && $b->getName() === 'Circle') {
            return $this->inIntersectCircleWithRectangle($a, $b); 
        }

        if ($a->getName() === 'Circle' && $b->getName() === 'Rectangle') {
            return $this->inIntersectCircleWithRectangle($b, $a); 
        }

        throw new \RuntimeException("Expecting Rectangle and Circle");
    
    }

    private function inIntersectCircleWithCircle(Circle $a, Circle $b): bool
    {
        return pow($a->getX() - $b->getX(),2) + pow($a->getY() - $b->getY(), 2) < pow($a->radius + $b->radius,2); 
    }
    
}