<?php
namespace AppTest\Geometry;

use App\Geometry\Rectangle;
use App\Geometry\Point;
use App\Geometry\Circle;
use App\Geometry\CircleWithCircleIntersector;
use PHPUnit\Framework\TestCase;

class CircleWithCircleIntersectorTest extends TestCase
{

    private $intersector;

    protected function setUp()
    {
        $this->intersector = new CircleWithCircleIntersector();    
    }

    /**
     * Shouldn't intersect
     * Shouldn't contain
     */
    public function testIsIntersect() 
    { 
        $p1 = new Point(1, 1);
        $a = new Circle(1, $p1);
        $p2 = new Point(5, 1);
        $b = new Circle(1, $p2);

        $this->assertEquals(false, $this->intersector->isIntersect($a, $b));
    }

    /**
     * Should intersect
     * Shouldn't contain
     * 1 intersect point
     */
    public function testIsIntersectCase2() 
    { 
        $p1 = new Point(1, 1);
        $a = new Circle(1, $p1);
        $p2 = new Point(3, 1);
        $b = new Circle(1, $p2);

        $this->assertEquals(true, $this->intersector->isIntersect($a, $b));
    }

    /**
     * Should intersect
     * Should contain
     */
    public function testIsIntersectCase3() 
    { 
        $p1 = new Point(1.5, 1.5);
        $a = new Circle(1, $p1);
        $p2 = new Point(1.5, 1.5);
        $b = new Circle(3, $p2);

        $this->assertEquals(true, $this->intersector->isIntersect($a, $b));
    }

    /**
     * Should intersect
     * Shouldn't contain
     * 2 intersect points
     */
    public function testIsIntersectCase4()  
    { 
        $p1 = new Point(1, 1);
        $a = new Circle(1, $p1);
        $p2 = new Point(1.5, 1);
        $b = new Circle(1, $p2);

        $this->assertEquals(true, $this->intersector->isIntersect($a, $b));
    }


    /**
     * Should intersect
     * Should contain
     */
    public function testIsIntersectCase5() 
    { 
        $p1 = new Point(1.5, 1.5);
        $a = new Circle(1, $p1);

        $this->assertEquals(true, $this->intersector->isIntersect($a, $a));
    }

    public function testShouldThrowAnExceptionForUnsupportedTypes()
    {
        $this->expectException(\RuntimeException::class);
        $this->intersector->isIntersect(new Rectangle(new Point(1, 3), new Point(3, 1)), new Circle(1, new Point(1, 1)));
    }
}
