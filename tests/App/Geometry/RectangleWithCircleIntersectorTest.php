<?php

namespace Apptest\Geometry;

use App\Geometry\Rectangle;
use PHPUnit\Framework\TestCase;

class RectangleWithCircleIntersectorTest extends TestCase
{
    public function isIntersectTest() 
    {
        $p1 = new Point(1, 1);
        $a = new Circle(3, $p1);
        $p2 = new Point(2, 2);
        $p3 = new Point(3, 3);
        $b = new Rectangle($p2, $p3);
        $this->assertEquals(true, this->isIntersect($a1, $b));
    }

    public function isIntersectTest2() 
    {
        $p1 = new Point(1, 1);
        $a = new Circle(3, $p1);
        $p2 = new Point(2, 2);
        $b = new Circle(2, $p3);
        $this->assertEquals(false, this->isIntersect($a1, $b));
    }    

    public function inIntersectCircleWithRectangleTest()
    {
        $p1 = new Point(1, 1);
        $a = new Circle(3, $p1);
        $p2 = new Point(2, 2);
        $p3 = new Point(3, 3);
        $b = new Rectangle($p2, $p3);

        $intersector = new Rectangle.....();

        $this->assertEquals(false, $intersector->isIntersect($a, $b));
    }

    public function inIntersectCircleWithRectangleTest()
    {
        $p1 = new Point(1, 1);
        $a = new Circle(3, $p1);
        $p2 = new Point(2, 2);
        $p3 = new Point(3, 3);
        $b = new Rectangle($p2, $p3);
        $this->assertEquals(true, $this->inIntersectCircleWithRectangle($b, $a));
    }    
}