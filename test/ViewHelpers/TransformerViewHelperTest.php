<?php

require_once '../../vendor/autoload.php';

use PHPUnit\Framework\Testcase;
use TransformersTopTrumps\Classes\Transformer;
use TransformersTopTrumps\ViewHelpers\TransformerViewHelper;

class TransformerViewHelperTest extends Testcase
{
    public function testSuccessDisplayTransformers()
    {
        $transformerMock = $this->createMock(Transformer::class);
        $transformerMock->method('getId')->willReturn(1);
        $transformerMock->method('getName')->willReturn('Cuthbert');
        $transformerMock->method('getSize')->willReturn(2);
        $transformerMock->method('getSpeed')->willReturn(3);
        $transformerMock->method('getPower')->willReturn(4);
        $transformerMock->method('getDisguise')->willReturn(5);
        $transformerMock->method('getTopTrumpsRating')->willReturn(6);
        $transformerMock->method('getType')->willReturn('bananas');
        $transformerMock->method('getImgUrl')->willReturn('pineapple.jpg');
        $transformerMock->method('getTimesShown')->willReturn(7);
        $transformerMock->method('getWinner')->willReturn(8);
        
        $input = [$transformerMock];
        
        $expected = '<div class="col card p-0 shadow transformer-div ">';
        $expected .= '<div class="card-body ">';
        $expected .= '<h2 class="card-title text-center mb-5">Cuthbert</h2>';
        $expected .= '<div class="d-lg-flex flex-row-reverse justify-content-around">';
        $expected .= '<div class="img-container mx-auto">';
        $expected .= '<img class="card-img-top mx-auto my-auto d-block rounded" src="pineapple.jpg" alt="Cuthbert"/>';
        $expected .= '</div>';
        $expected .= '<div class="stats-container py-3 py-lg-0">';
        $expected .= '<h3 class="card-text">Size: 2</h3>';
        $expected .= '<h3 class="card-text">Speed: 3</h3>';
        $expected .= '<h3 class="card-text">Power: 4</h3>';
        $expected .= '<h3 class="card-text">Disguise: 5</h3>';
        $expected .= '<h3 class="card-text">Top Trumps Rating: 6</h3>';
        $expected .= '<h3 class="card-text">Type: bananas</h3>';
        $expected .= '<h3 class="card-text">Times shown: 8</h3>';
        $expected .= '<h3 class="card-text">Wins: 8</h3>';
        $expected .= '</div>';
        $expected .= '</div>';
        $expected .= '</div>';
        $expected .= '<div class="card-footer text-center py-3"';
        $expected .= '</div>';
        $expected .= '<form action="hidden.php" method="POST">';
        $expected .= '<input type="hidden" name="id" value="1" />';
        $expected .= '<input type="hidden" name="wins" value="8" />';
        $expected .= '<button type="submit" class="btn select-btn p-3">SELECT</button>';
        $expected .= '</form>';
        $expected .= '</div>';
        $expected .= '</div>';
        $expected .= '</div>';
        
        $actual = TransformerViewHelper::displayTransformers($input);
        $this->assertEquals($expected, $actual);
    }

    public function testFailureDisplayTransformers()
    {
        $input = [1, 2];
        
        $expected = '<p>Error: Missing data</p><p>Error: Missing data</p>';
        
        $actual = TransformerViewHelper::displayTransformers($input);
        $this->assertEquals($expected, $actual);
    }

    public function testMalformedMDisplayTransformers()
    {
        $input = 'hello';
        $this->expectException(TypeError::class);
        $case = TransformerViewHelper::displayTransformers($input);
    }
}