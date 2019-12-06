<?php
namespace App\Geometry;

class Intersector implements IntersectorInterface
{
    /**
     * @var array
     */
    private $intersectors;

    public function __construct(array $intersectors)
    {
        $this->intersectors = $intersectors;
    }

    public function isIntersect(ShapeInterface $a, ShapeInterface $b): bool
    {
        $result = false;
        $isSupported = false;

        foreach ($this->intersectors as $intersectors) {
            if ($isSupported) {
                break;
            }

            try {
                $result = $intersectors->isIntersect($a, $b);
                $isSupported = true;
            } catch (\RuntimeException $e) {

            }
        }

        if (!$isSupported) {
            throw new \RuntimeException("Unsupported types of shape");
        }
        
        return $result;
    }    
}
