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

    // /**
    //  * @var ShapeInterfaceA
    //  */
    // public $shapeA;

    // /**
    //  * @var ShapeInterfaceB
    //  */
    // public $shapeB;

    // private $strategy = NULL;

    // Public function __construct($strategyShapeTypeA, $strategyShapeTypeB)
    // {
    //     if ($strategyShapeTypeA->getName() || $strategyShapeTypeB->getName() !== 'Recatangle' || 'Circle') {
    //         throw new Exception('Shape not accepted');
    //         return;
    //     }

    //     $this->shapeA = $strategyShapeTypeA;
    //     $this->shapeB = $strategyShapeTypeB;
    //     //$bothShapes = array($this->shapeA, $this->shapeB);

    //     public function isIntersect($strategyShapeTypeA, $strategyShapeTypeB)
    //     {

    //     }

    //     // switch([$this->shapeA->getName(), $this->shapeB->getName()]) {
    //     //     case ['Circle', 'Circle'] :
    //     //         $this->strategy = new StrategyCC();
    //     //     break;
    //     //     case ['Circle', 'Rectangle'] :
    //     //         $this->strategy = new StrategyCR();
    //     //     break;
    //     //     case ['Rectangle', 'Rectangle'] :
    //     //         $this->strategy = new StrategyRR();
    //     //     break;            
    //     // }
         
    // }


    //isIntersect($a, Rectangle $r1) {}

        public function isIntersect(ShapeInterface $a, ShapeInterface $b): bool
        {
            // this
            if ($a->getName() === 'Circle' && $b->getName() === 'Circle') {
                return $this->inIntersectCircleWithCircle($a, $b);
            }

            throw new \RuntimeException("This implementation doesn't support operations for the given types");

            // or this

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

        // test file
        // $intersector = new Intersector(
            // [new RectangleWithCircleIntersector(), new CircleWithCircleIntersector(), .... ]
        //)
}
