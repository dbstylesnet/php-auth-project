<?php

namespace Apptest\Geometry;

use App\Geometry\Rectangle;
use PHPUnit\Framework\TestCase;

class RectangleWithCircleIntersectorTest extends TestCase
{

    $p1 = new Point(1, 1);
    $a = new Circle(3, $p1);
    $p2 = new Point(2, 2);
    $p3 = new Point(3, 3);
    $b = new Rectangle($p2, $p3);    
    $intersector = new RectangleWithCircleIntersector();

    public function testIsIntersect() 
    {
        $this->assertEquals(true, $intersector->isIntersect($a, $b));
        $this->assertEquals(true, $intersector->isIntersect($b, $a));
        $this->assertEquals(true, $intersector->isIntersect($b, $b));
        $this->assertEquals(true, $intersector->isIntersect($a, $a));
    }

    public function testIsIntersect2()
    {
        $p5 = new Point(1, 1);
        $a = new Circle(3, $p5);
        $p6 = new Point(2, 2);
        $p7 = new Point(3, 3);
        $b = new Rectangle($p6, $p7);

        $intersector = new RectangleWithCircleIntersector();

        $this->assertEquals(false, $intersector->isIntersect($a, $b));
    }

}