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
        return $a->getCenter()->distance($b->getCenter()) <= ($a->getRadius() + $b->getRadius());
    }
}
