<?php

namespace TransformersTopTrumps\ViewHelpers;

use TransformersTopTrumps\Classes\Transformer;

class LeaderboardViewHelper
{
    public static function displayLeaderboard(array $topFive): string
    {
        $result = '';
        $count = 0;

        foreach ($topFive as $transformer) {
            if ($transformer instanceof Transformer) {
                $count++;
                $result .= '<div><h4>' . $count . '. ' . $transformer->getName() . '</h4>';
                $result .= '<p>Win rate: ' . round($transformer->getWinRatio(), 2) . '%</p></div>';
            } else {
                $result .= '<p>Error: Missing data</p>';
            }
        }
        
        return $result;
    }
}