<?php

namespace AppTest\Geometry;

use App\Geometry\Rectangle;
use App\Geometry\Point;
use App\Geometry\Circle;
use App\Geometry\RectangleWithCircleIntersector;
use PHPUnit\Framework\TestCase;

class RectangleWithCircleIntersectorTest extends TestCase
{
    /**
     * @var IntersectorInterface
     */
    private $intersector;

    /**
     * @interitdoc
     */
    protected function setUp()
    {
        $this->intersector = new RectangleWithCircleIntersector();    
    }

    /**
     * Should intersect 
     * Shouldn't contain
     * 1 intersection point
     */
    public function testIsIntersect() 
    { 
        $p1 = new Point(1, 1);
        $a = new Circle(1, $p1);
        $p2 = new Point(2, 2);
        $p3 = new Point(4, 0);
        $b = new Rectangle($p2, $p3);

        $this->assertEquals(true, $this->intersector->isIntersect($a, $b));
    }

    /**
     * Should intersect 
     * Shouldn't contain
     * 2 intersection point
     */
    public function testIsIntersectCase2() 
    { 
        $p1 = new Point(1, 1);
        $a = new Circle(1, $p1);
        $p2 = new Point(1, 2);
        $p3 = new Point(3, 0);
        $b = new Rectangle($p2, $p3);

        $this->assertEquals(true, $this->intersector->isIntersect($a, $b));
    }

    /**
     * Shouldn't intersect 
     * Shouldn't contain
     * 2 intersection point
     */
    public function testIsIntersectCase3()
    {
        $p5 = new Point(1, 1);
        $a1 = new Circle(1, $p5);
        $p6 = new Point(3, 2);
        $p7 = new Point(5, 0);
        $b1 = new Rectangle($p6, $p7);

        $this->assertEquals(false, $this->intersector->isIntersect($a1, $b1));
    }

    /**
     * Should intersect 
     * Should contain
     */
    public function testIsIntersectCase4()
    {
        $p5 = new Point(1.5, 1.5);
        $a1 = new Circle(1, $p5);
        $p6 = new Point(0, 3);
        $p7 = new Point(3, 0);
        $b1 = new Rectangle($p6, $p7);

        $this->assertEquals(true, $this->intersector->isIntersect($a1, $b1));
    }

    /**
     * Should intersect 
     * Should contain
     */
    public function testIsIntersectCase5()
    {
        $p5 = new Point(1.5, 1.5);
        $a1 = new Circle(1.5, $p5);
        $p6 = new Point(1, 2);
        $p7 = new Point(2, 1);
        $b1 = new Rectangle($p6, $p7);

        $this->assertEquals(true, $this->intersector->isIntersect($a1, $b1));
    }

    public function testShouldThrowAnExceptionForUnsupportedTypes()
    {
        $this->expectException(\RuntimeException::class);
        $this->intersector->isIntersect(new Circle(1, new Point(1, 1)), new Circle(1, new Point(1, 1)));
    }
}