<?php

namespace AppTest\Geometry;

use App\Geometry\Point;
use App\Geometry\Circle;
use App\Geometry\Rectangle;
use App\Geometry\CircleWithCircleIntersector;
use App\Geometry\RectangleWithCircleIntersector;
use App\Geometry\Intersector;
use PHPUnit\Framework\TestCase;

class IntersectorTest extends TestCase
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
        $this->intersector = new Intersector([
            new CircleWithCircleIntersector(),
            new RectangleWithCircleIntersector()
        ]); 
    }

    public function testShouldIntersectCircles()
    {
        $c1 = new Circle(1, new Point(0, 0));
        $c2 = new Circle(2, new Point(0, 0));

        $this->assertEquals(true, $this->intersector->isIntersect($c1, $c2));
    }

    public function testShouldIntersectRectangle()
    {
        $c1 = new Circle(1, new Point(0, 0));
        $c2 = new Rectangle(new Point(0, 0), new Point(1, 1));

        $this->assertEquals(true, $this->intersector->isIntersect($c1, $c2));
    }
}