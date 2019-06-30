<?php

namespace App\Geometry;

class CircleWithCircleIntersector implements IntersectorInterface
{
    private function inIntersectCircleWithCircle(Circle $a, Circle $b): bool
    {
        return pow($a->getX() - $b->getX(),2) + pow($a->getY() - $b->getY(), 2) < pow($a->radius + $b->radius,2); 
    }
}