<?php

namespace App\Geometry;

// composite design pattern
class Intersect implements IntersectorInterface
{
//field itnersectors

    public function __construct($intersectors)
    {
        $this->intersectors = $intersectors; //curlc with recta //.... .
    }

    //isIntersect($a, Rectangle $r1) {}

        public function isIntersect(ShapeInterface $a, ShapeInterface $b): bool
        {
            $result = false;
            $isSupported = false;

            foreach ($this->intersectors as $intersector) {
                if ($isSupported) {
                    break;
                }

                try {
                    $result = $intersector->isIntersect($a, $b);
                    $isSupported = true;
                } catch (UnsupportedShapeException $e) {

                }
            }

            if (!$isSupported) {
                throw new \RuntimeException("This implementation doesn't support operations for the given types");
            }

            return $result;
        }

        private function inIntersectCircleWithCircle(ShapeInterface $a, ShapeInterface $b): bool
        {
            // hrere login
        }

        // test file

        
        // $intersector = new Intersector(
            // [new RectangleWithCircleIntersector(), new CircleWithCircleIntersector(), .... ]
        //)
}
