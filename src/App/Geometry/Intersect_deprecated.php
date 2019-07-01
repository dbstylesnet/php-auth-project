<?php

namespace App\Geometry;


class Intersect2 implements IntersectorInterface
{


    public function isIntersect2a(ShapeInterface $a, ShapeInterface $b): bool
    {
        // Option Ia for solution
        if ($a->getName() === 'Circle' && $b->getName() === 'Circle') {
            return $this->inIntersectCircleWithCircle($a, $b);
        } elseif ($a->getName() === 'Circle' && $b->getName() === 'Rectangle') {
            return $this->inIntersectCircleWithRectangle($a, $b);
        } elseif ($a->getName() === 'Rectangle' && $b->getName() === 'Rectangle') {
            return $this->inIntersectRectangleWithRectangle($a, $b);
        } else {
            throw new \RuntimeException("This implementation doesn't support operations for the given types");
        }

    }

    // Option Ib for solution
    public function isIntersect2b(ShapeInterface $a, ShapeInterface $b): bool
    {
        if ($a->getName() === 'Circle' && $b->getName() === 'Circle') {
            return (new CircleWithCircleIntersector())->inIntersectCircleWithCircle($a, $b);
        } elseif ($a->getName() === 'Circle' && $b->getName() === 'Rectangle') {
            return (new RectangleWithCircleIntersector())->inIntersectRectangleWithCircle($a, $b);
        } elseif ($a->getName() === 'Rectangle' && $b->getName() === 'Rectangle') {
            return (new RectangleWithCircleIntersector())->inIntersectRectangleWithRectangle($a, $b);
        } else {
            throw new \RuntimeException("This implementation doesn't support operations for the given types");
        }

    }


    // We can call private functions using Ia or relate to functions in generated objects in Ib
    private function inIntersectCircleWithCircle(ShapeInterface $a, ShapeInterface $b): bool
    {
        return pow($a->getX() - $b->getX(),2) + pow($a->getY() - $b->getY(), 2) < pow($a->radius + $b->radius,2); 
    }

    private function inIntersectCircleWithRectangle(ShapeInterface $a, ShapeInterface $b): bool
    {
        $cDistX = abs($a->getX() - $b->center->getX());
        $cDistY = abs($a->getY() - $b->center->getY());

        if ($cDistX > ($b->getWidth() / 2 + $a->radius)) {
            return false;
        }
    
        if ($cDistY > ($b->getHeight() / 2 + $a->radius)) {
            return false;
        }
    
        if ($cDistX <= ($b->getWidth() / 2)) {
            return true;
        }

        if ($cDistY <= ($b->getheight() / 2)) {
            return true;
        }

        $cornerDist = pow($cDistX - $b->getWidth() / 2, 2) + pow($cDistY - $b->getHeight() / 2, 2);

        return $cornerDist <= pow($a->radius, 2);
    }

    private function inIntersectRectangleWithRectangle(ShapeInterface $a, ShapeInterface $b): bool
    {
        return pow($a->getX() - $b->getX(),2) + pow($a->getY() - $b->getY(), 2) < pow($a->radius + $b->radius,2); 
    }        

}
