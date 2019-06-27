<?php

namespace App\Geometry;

// test file

// $intersector = new Intersector(
    // [new RectangleWithCircleIntersector(), new CircleWithCircleIntersector(), .... ]
//)

class Intersector {
    $intersector = new Intersector(
        [new RectangleWithCircleIntersector(), new CircleWithCircleIntersector(), new RectangleWithRectangle() ]
    );
}
