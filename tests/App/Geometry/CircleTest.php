<?php

namespace AppTest\Geometry;

use App\Geometry\Point;
use PHPUnit\Framework\TestCase;

class CircleTest extends TestCase
{
    public function testGetDistance()
    {
        $c1 = new Circle(3);
        $this->assertEquals(6, calculateDiameter($c1));
        $this->assertEquals(28.26, calculateArea($c1));
        $this->assertEquals(18.84, calculateCircumference($c1));
    }
}
