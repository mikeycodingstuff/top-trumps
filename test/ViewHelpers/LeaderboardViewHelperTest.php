<?php

require_once '../../vendor/autoload.php';

use PHPUnit\Framework\Testcase;
use TransformersTopTrumps\Classes\Transformer;
use TransformersTopTrumps\ViewHelpers\LeaderboardViewHelper;

class LeaderboardViewHelperTest extends Testcase
{
    public function testSuccessDisplayLeaderboard()
    {
        $transformerMock1 = $this->createMock(Transformer::class);
        $transformerMock1->method('getName')->willReturn('Cuthbert');
        $transformerMock1->method('getWinRatio')->willReturn(11.11);
        $transformerMock2 = $this->createMock(Transformer::class);
        $transformerMock2->method('getName')->willReturn('Gerbert');
        $transformerMock2->method('getWinRatio')->willReturn(22.22);
        $transformerMock3 = $this->createMock(Transformer::class);
        $transformerMock3->method('getName')->willReturn('Herbert');
        $transformerMock3->method('getWinRatio')->willReturn(33.33);
        $transformerMock4 = $this->createMock(Transformer::class);
        $transformerMock4->method('getName')->willReturn('Sherbert');
        $transformerMock4->method('getWinRatio')->willReturn(44.44);
        $transformerMock5 = $this->createMock(Transformer::class);
        $transformerMock5->method('getName')->willReturn('Berbert');
        $transformerMock5->method('getWinRatio')->willReturn(55.55);
        

        $input = [
            $transformerMock1,
            $transformerMock2,
            $transformerMock3,
            $transformerMock4,
            $transformerMock5,
        ];

        $expected = '<div><h4>1. Cuthbert</h4><p>Win rate: 11.11%</p></div>';
        $expected .= '<div><h4>2. Gerbert</h4><p>Win rate: 22.22%</p></div>';
        $expected .= '<div><h4>3. Herbert</h4><p>Win rate: 33.33%</p></div>';
        $expected .= '<div><h4>4. Sherbert</h4><p>Win rate: 44.44%</p></div>';
        $expected .= '<div><h4>5. Berbert</h4><p>Win rate: 55.55%</p></div>';
        ;

        $actual = LeaderboardViewHelper::displayLeaderboard($input);
        $this->assertEquals($expected, $actual);
    }

    public function testFailureDisplayLeaderboard()
    {
        $input = [1, 2];
        
        $expected = '<p>Error: Missing data</p><p>Error: Missing data</p>';
        
        $actual = LeaderboardViewHelper::displayLeaderboard($input);
        $this->assertEquals($expected, $actual);
    }

    public function testMalformedMDisplayLeaderboard()
    {
        $input = 'hello';
        $this->expectException(TypeError::class);
        $case = LeaderboardViewHelper::displayLeaderboard($input);
    }
}