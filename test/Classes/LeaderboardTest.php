<?php

require_once '../../vendor/autoload.php';

use PHPUnit\Framework\Testcase;
use TransformersTopTrumps\Classes\Leaderboard;
use TransformersTopTrumps\Classes\Transformer;

class LeaderboardTest extends Testcase
{
    public function testSuccessCalculateTopFive()
    {
        $transformerMock1 = $this->createMock(Transformer::class);
        $transformerMock1->method('getWinRatio')->willReturn(22.22);
        $transformerMock2 = $this->createMock(Transformer::class);
        $transformerMock2->method('getWinRatio')->willReturn(33.33);
        $transformerMock3 = $this->createMock(Transformer::class);
        $transformerMock3->method('getWinRatio')->willReturn(44.44);
        $transformerMock4 = $this->createMock(Transformer::class);
        $transformerMock4->method('getWinRatio')->willReturn(55.55);
        $transformerMock5 = $this->createMock(Transformer::class);
        $transformerMock5->method('getWinRatio')->willReturn(66.66);
        $transformerMock6 = $this->createMock(Transformer::class);
        $transformerMock6->method('getWinRatio')->willReturn(77.77);

        $input = [
            $transformerMock1,
            $transformerMock2,
            $transformerMock3,
            $transformerMock4,
            $transformerMock5,
            $transformerMock6
        ];

        $expected = [
            $transformerMock6,
            $transformerMock5,
            $transformerMock4,
            $transformerMock3,
            $transformerMock2
        ];

        $actual = Leaderboard::calculateTopFive($input);
        $this->assertEquals($expected, $actual);
    }

    public function testFailureCalculateTopFive()
    {
        $input = [];

        $expected = [];

        $actual = Leaderboard::calculateTopFive($input);
        $this->assertEquals($expected, $actual);
    }

    public function testMalformedCalculateTopFive()
    {
        $input = 'hello';
        $this->expectException(TypeError::class);
        $case = Leaderboard::calculateTopFive($input);
    }
}