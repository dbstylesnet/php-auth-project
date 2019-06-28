<?php

namespace App\Geometry;

// test file

// $intersector = new Intersector(
    // [new RectangleWithCircleIntersector(), new CircleWithCircleIntersector(), .... ]
//)

// class Intersector {
return $intersector = new Intersector(
    [new RectangleWithCircleIntersector(), new CircleWithCircleIntersector(), new RectangleWithRectangle() ]
);
// }
