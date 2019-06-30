<?php

namespace App\Geometry;

// composite design pattern
class Intersect implements IntersectorInterface
{

    public function isIntersect(ShapeInterface $a, ShapeInterface $b): bool
    {
        if ($a->getName() === 'Circle' && $b->getName() === 'Circle') {
            return new CircleWithCircleIntersector->inIntersectCircleWithCircle($a, $b);
        } elseif ($a->getName() === 'Circle' && $b->getName() === 'Rectangle') {
            return new RectangleWithCircleIntersector->inIntersectRectangleWithCircle($a, $b);
        } elseif ($a->getName() === 'Rectangle' && $b->getName() === 'Rectangle') {
            return new RectangleWithRectangleIntersector->inIntersectRectangleWithRectangle($a, $b);
        } else {
            throw new \RuntimeException("This implementation doesn't support operations for the given types");
        } 
    }

    // private function inIntersectCircleWithRectangle(ShapeInterface $a, ShapeInterface $b): bool
    // {
    //     $cDistX = abs($a->getX() - $b->center->getX());
    //     $cDistY = abs($a->getY() - $b->center->getY());

    //     if ($cDistX > ($b->getWidth() / 2 + $a->radius)) {
    //         return false;
    //     }
    
    //     if ($cDistY > ($b->getHeight() / 2 + $a->radius)) {
    //         return false;
    //     }
    
    //     if ($cDistX <= ($b->getWidth() / 2)) {
    //         return true;
    //     }

    //     if ($cDistY <= ($b->getheight() / 2)) {
    //         return true;
    //     }

    //     $cornerDist = pow($cDistX - $b->getWidth() / 2, 2) + pow($cDistY - $b->getHeight() / 2, 2);

    //     return $cornerDist <= pow($a->radius, 2);
    // }

    // private function inIntersectRectangleWithRectangle(ShapeInterface $a, ShapeInterface $b): bool
    // {
    //     return pow($a->getX() - $b->getX(),2) + pow($a->getY() - $b->getY(), 2) < pow($a->radius + $b->radius,2); 
    // }        

}
