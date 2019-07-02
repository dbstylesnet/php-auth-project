<?php

namespace AppTest\Geometry;

use App\Geometry\Rectangle;
use App\Geometry\Point;
use App\Geometry\Circle;
use App\Geometry\RectangleWithCircleIntersector;
use PHPUnit\Framework\TestCase;

class RectangleWithCircleIntersectorTest extends TestCase
{

    private $intersector;

    protected function setUp()
    {
        $this->intersector = new RectangleWithCircleIntersector();    
    }

    public function testIsIntersect() 
    { 
        $p1 = new Point(1, 1);
        $a = new Circle(3, $p1);
        $p2 = new Point(2, 2);
        $p3 = new Point(3, 3);
        $b = new Rectangle($p2, $p3);

        $this->assertEquals(true, $this->intersector->isIntersect($a, $b));
        $this->assertEquals(true, $this->intersector->isIntersect($b, $a));
    }

    public function testIsIntersect2()
    {
        $p5 = new Point(1, 1);
        $a1 = new Circle(3, $p5);
        $p6 = new Point(2, 2);
        $p7 = new Point(3, 3);
        $b1 = new Rectangle($p6, $p7);

        $this->assertEquals(true, $this->intersector->isIntersect($a1, $b1));
    }

    public function testShouldThrowAnExceptionForUnsupportedTypes()
    {
        $this->expectException(\RuntimeException::class);
        $this->intersector->isIntersect(new Circle(1, new Point(1, 1)), new Circle(1, new Point(1, 1)));
    }
}