<?php

namespace App\Geometry;

class RectangleWithRectangleIntersector implements IntersectorInterface
{

    public function isIntersect(ShapeInterface $a, ShapeInterface $b): bool
    {
        if ($a->getName() === 'Rectangle' && $b->getName() === 'Rectangle') {
            return $this->inIntersectRectangleWithRectangle($a, $b); 
        }

        throw new \RuntimeException("Expecting Rectangles");
    
    }

    private function inIntersectRectangleWithCircle(Rectangle $a, Rectangle $b): bool
    {
        $cDistX = abs($a->getCenter()->getX() - $b->getCenter()->getX());
        $cDistY = abs($a->getCenter()->getY() - $b->getCenter()->getY());

        if ($cDistX > ($a->getWidth() / 2 + $b->getRadius())) {
            return false;
        }
    
        if ($cDistY > ($a->getHeight() / 2 + $b->getRadius())) {
            return false;
        }
    
        if ($cDistX <= ($a->getWidth() / 2)) {
            return true;
        }

        if ($cDistY <= ($a->getHeight() / 2)) {
            return true;
        }

        $cornerDist = pow($cDistX - $a->getWidth() / 2, 2) + pow($cDistY - $a->getHeight() / 2, 2);

        return $cornerDist <= pow($b->getRadius(), 2);
    }
    
}