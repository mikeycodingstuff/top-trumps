<?php

namespace TransformersTopTrumps\Classes;

class Leaderboard
{
    public static function calculateTopFive(array $allTransformers): array
    {
        usort($allTransformers, function($first, $second)
        {
                return $first->getWinRatio() < $second->getWinRatio();
        });

        $topFive = array_slice($allTransformers, 0, 5);

        return $topFive;
    }
}