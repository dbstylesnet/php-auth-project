<?php

namespace AppTest\Geometry;

use Geometry\Point;
use Geometry\Circle;
use Geometry\Rectangle;
use Geometry\CircleWithCircleIntersector;
use Geometry\RectangleWithCircleIntersector;

class Intersect extends TestCase
{
    public function testIsIntersect() {
        $p1 = new Point(1, 2);
        $p2 = new Point(3, 0);
        $a = new Rectangle($p1, $p2);
        $p3 = new Point(1, 2);
        $p4 = new Point(3, 0);
        $b = new Rectangle($p3, $p4);
        $p5 = new Point(1, 1);
        $c = new Circle(1, $p3);
        $i1 = new CircleWithCircleIntersector();
        $i2 = new RectangleWithRectangleIntersector($a, $b);
        $i3 = new RectangleWithCircleIntersector($a, $c);
        $intersectors = array($i1, $i2, $i3);
        $this->assertEquals(true, isIntersect($intersectors));
    }
}