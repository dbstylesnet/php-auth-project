<?php

namespace App\Geometry;

interface IntersectorInterface
{
    /**
     * @param $a ShapeInterface
     * @param $b ShapeInterface
     * @throws UnsupportedShapeException
     */
    public function isIntersect(ShapeInterface $a, ShapeInterface $b): bool;
}