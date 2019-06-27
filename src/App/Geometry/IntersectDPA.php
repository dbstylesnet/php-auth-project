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
            // option I
            if ($a->getName() === 'Circle' && $b->getName() === 'Circle') {
                return $this->inIntersectCircleWithCircle($a, $b);
            } elseif ($a->getName() === 'Circle' && $b->getName() === 'Rectangle') {
                return $this->inIntersectCircleWithRectangle($a, $b);
            } elseif ($a->getName() === 'Rectangle' && $b->getName() === 'Rectangle') {
                return $this->inIntersectRectangleWithRectangle($a, $b);
            } else {
                throw new \RuntimeException("This implementation doesn't support operations for the given types");
            }


            // option II
            $result = false;
            $isSupported = false; // we have already found corresponding intersector by the given names

            foreach ($this->intersectors as $intersector) {
                if ($isSupported) {
                    break;
                }

                try {
                    $result = $intersector->isIntersect($a, $b);
                    $isSupported = true;
                } catch (UnsupportBlaslb $e) {

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


}
