<?php
namespace AppTest\Geometry;

use App\Geometry\Rectangle;
use App\Geometry\Point;
use PHPUnit\Framework\TestCase;

class RectangleTest extends TestCase
{
    public function testGetName()
    {
        $p1 = new Point(1,2);
        $p2 = new Point(2,1);
        $r1 = new Rectangle($p1, $p2);

        $this->assertEquals('Rectangle', $r1->getName());
    }    

    public function testGetArea()
    {
        $p3 = new Point(2,7);
        $p4 = new Point(4,4);        
        $r2 = new Rectangle($p3, $p4); 

        $this->assertEquals(6, $r2->getArea());
    }

    public function testGetPerimeter()
    {
        $p7 = new Point(2,8);
        $p8 = new Point(6,1);
        $r4 = new Rectangle($p7, $p8);

        $this->assertEquals(22, $r4->getPerimeter());
    }

    public function testGetDiagonal()
    {
        $p5 = new Point(3,7);
        $p6 = new Point(6,3);        
        $r3 = new Rectangle($p5, $p6);

        $this->assertEquals(5, $r3->getDiagonal());
    }
}
