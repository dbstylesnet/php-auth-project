<?php

namespace App\Geometry;

interface Intersector
{
    /**
     * @param $a ShapeInterface
     * @param $b ShapeInterface
     */
    public function isIntersect(ShapeInterface $a, ShapeInterface $b): bool;
}