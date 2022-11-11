<?php

namespace TransformersTopTrumps\ViewHelpers;

use TransformersTopTrumps\Classes\Transformer;

class TransformerViewHelper
{
    public static function displayTransformers(array $transformers): string {
        $result = '';
        
        foreach ($transformers as $transformer) {
            if ($transformer instanceof Transformer) {
                $result .= '<div class="col card p-0 shadow transformer-div ">';
                $result .= '<div class="card-body ">';
                $result .= '<h2 class="card-title text-center mb-5">' . $transformer->getName() . '</h2>';
                $result .= '<div class="d-lg-flex flex-row-reverse justify-content-around">';
                $result .= '<div class="img-container mx-auto">';
                $result .= '<img class="card-img-top mx-auto my-auto d-block rounded" src="' . $transformer->getImgUrl() . '" alt="' . $transformer->getName() . '"/>';
                $result .= '</div>';
                $result .= '<div class="stats-container py-3 py-lg-0">';
                $result .= '<h3 class="card-text">Size: ' . $transformer->getSize() . '</h3>';
                $result .= '<h3 class="card-text">Speed: ' . $transformer->getSpeed() . '</h3>';
                $result .= '<h3 class="card-text">Power: ' . $transformer->getPower() . '</h3>';
                $result .= '<h3 class="card-text">Disguise: ' . $transformer->getDisguise() . '</h3>';
                $result .= '<h3 class="card-text">Top Trumps Rating: ' . $transformer->getTopTrumpsRating() . '</h3>';
                $result .= '<h3 class="card-text">Type: ' . $transformer->getType() . '</h3>';
                $result .= '<h3 class="card-text">Times shown: ' . ($transformer->getTimesShown() + 1) . '</h3>';
                $result .= '<h3 class="card-text">Wins: ' . $transformer->getWinner() . '</h3>';
                $result .= '</div>';
                $result .= '</div>';
                $result .= '</div>';
                $result .= '<div class="card-footer text-center py-3"';
                $result .= '</div>';
                $result .= '<form action="hidden.php" method="POST">';
                $result .= '<input type="hidden" name="id" value="' . $transformer->getId() . '" />';
                $result .= '<input type="hidden" name="wins" value="' . $transformer->getWinner() . '" />';
                $result .= '<button type="submit" class="btn select-btn p-3">SELECT</button>';
                $result .= '</form>';
                $result .= '</div>';
                $result .= '</div>';
                $result .= '</div>';
            } else {
                $result .= '<p>Error: Missing data</p>';
            }
        }

        return $result;
    }
}