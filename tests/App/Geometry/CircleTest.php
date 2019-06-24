<?php

namespace AppTest\Geometry;

use App\Geometry\Circle;
use PHPUnit\Framework\TestCase;

class CircleTest extends TestCase
{
    public function testCalculateDiameter()
    {
        $c1 = new Circle(3);
        $this->assertEquals(6, $c1->calculateDiameter());
        // $this->assertEquals(28.26, calculateArea($c1));
        // $this->assertEquals(18.84, calculateCircumference($c1));
    }

    // isIntersect($a ShapeInterface, $b ShapeInterface): bool
}
