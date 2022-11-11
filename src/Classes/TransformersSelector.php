<?php

namespace TransformersTopTrumps\Classes;

class TransformersSelector
{
    public static function pickRandomTwo(array $allTransformers): array {
        shuffle($allTransformers);
        $result = array_slice($allTransformers, 0, 2);
        return $result;
    }
}