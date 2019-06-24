<?php

namespace AppTest\Geometry;

use App\Geometry\Circle;
use PHPUnit\Framework\TestCase;

class CircleTest extends TestCase
{

    public function testGetName()
    {
        $c1 = new Circle(3,(1,1));
        $this->assertEquals('Circle', $c1->getName());
    }    

    public function testGetDiameter()
    {
        $c2 = new Circle(3,(2,2)); // whats the scope of c2 in tests?
        $this->assertEquals(6, $c2->getDiameter());
    }

    public function testGetArea()
    {
        $c3 = new Circle(4,(0,0));
        $this->assertEquals(50.24, $c3->getArea());
    }

    public function testGetPerimeter()
    {
        $c4 = new Circle(5,(1,2));
        $this->assertEquals(31.4, $c4->getPerimeter());
    }

    // isIntersect($a ShapeInterface, $b ShapeInterface): bool
}
